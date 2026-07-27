<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Services\CarService;
use App\Services\DriverService;
use App\Services\RaceService;
use App\Services\SponsorService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * HomeController
 * --------------
 * Drives the main landing page (/).
 * All data retrieval is delegated to the Service Layer.
 */
class HomeController extends Controller
{
    public function __construct(
        protected DriverService  $driverService,
        protected CarService     $carService,
        protected RaceService    $raceService,
        protected SponsorService $sponsorService,
    ) {}

    /**
     * GET /
     * Renders the RGR homepage with:
     *  - Team metadata
     *  - Title sponsors for hero badge
     *  - Driver spotlight (2 drivers)
     *  - Primary F1 car specs
     *  - Next race + countdown seconds
     *  - 3 latest news articles
     *  - All sponsors grouped by tier (for footer)
     */
    public function index(): View
    {
        // Fetch the single RGR team record
        $team = Team::first();

        $teamId = $team?->id ?? 0;

        // Service calls — no model queries in the controller
        $titleSponsors    = $this->sponsorService->getTitleSponsors($teamId);
        $spotlightDrivers = $this->driverService->getSpotlightDrivers(2);
        $primaryCar       = $this->carService->getPrimaryF1Car();
        $nextRace         = $this->raceService->getNextRace();
        $countdownSeconds = $this->raceService->getCountdownSeconds();
        $latestArticles   = $this->raceService->getLatestArticles(3);
        $sponsorsByTier   = $this->sponsorService->getSponsorsByTier($teamId);
        $enduranceEvents  = $this->raceService->getAllEnduranceRaces();
        $driverStats      = $this->driverService->getTeamDriverStats();

        return view('home.index', compact(
            'team',
            'titleSponsors',
            'spotlightDrivers',
            'primaryCar',
            'nextRace',
            'countdownSeconds',
            'latestArticles',
            'sponsorsByTier',
            'enduranceEvents',
            'driverStats',
        ));
     }

     /**
      * GET /drivers
      * Renders public driver lineup page.
      */
     public function drivers(): View
     {
          $team = Team::first();
          $drivers = \App\Models\Driver::active()->with('team')->get();
          $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);

          return view('drivers.index', compact('team', 'drivers', 'sponsorsByTier'));
      }

      /**
       * GET /f1-division
       * Renders public F1 division page.
       */
      public function f1Division(): View
      {
          $team = Team::first();
          $f1Drivers = \App\Models\Driver::active()->where('category', 'F1')->with('team')->get();
          $f1Car = \App\Models\Car::where('category', 'F1')->first();
          $f1Schedule = \App\Models\RaceSchedule::orderBy('race_date')->get();
          $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);

          return view('f1.division', compact('team', 'f1Drivers', 'f1Car', 'f1Schedule', 'sponsorsByTier'));
      }

     /**
      * GET /paddock-club
      * Renders public F1 Paddock Club Page.
      */
     public function paddockClub(): View
     {
         $team = Team::first();
         $nextRace = \App\Models\RaceSchedule::where('status', 'Upcoming')->orderBy('race_date')->first();
         $allRaces = \App\Models\RaceSchedule::orderBy('race_date')->get();
         $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);

         return view('f1.paddock-club', compact('team', 'nextRace', 'allRaces', 'sponsorsByTier'));
     }

     /**
      * GET /race-schedule
      * Renders public full schedule page.
      */
     public function schedule(): View
     {
         $team = Team::first();
         $upcomingRaces = \App\Models\RaceSchedule::where('status', 'Upcoming')->orderBy('race_date')->get();
         $finishedRaces = \App\Models\RaceSchedule::where('status', 'Finished')->orderBy('race_date', 'desc')->get();
         $enduranceEvents = $this->raceService->getAllEnduranceRaces();
         $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);

         return view('schedule.index', compact('team', 'upcomingRaces', 'finishedRaces', 'enduranceEvents', 'sponsorsByTier'));
     }

     /**
      * GET /standings
      * Renders public live standings standings page.
      */
     public function standings(): View
     {
         $team = Team::first();
         $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);

         // Dummy Standings data for rich high-tech visual standings
         $driverStandings = [
             ['pos' => 1, 'name' => 'Max Verstappen', 'team' => 'RG Racing', 'points' => 186, 'wins' => 4, 'logo' => 'RGR'],
             ['pos' => 2, 'name' => 'Charles Leclerc', 'team' => 'Ferrari', 'points' => 152, 'wins' => 2, 'logo' => 'FER'],
             ['pos' => 3, 'name' => 'Lando Norris', 'team' => 'McLaren', 'points' => 145, 'wins' => 1, 'logo' => 'MCL'],
             ['pos' => 4, 'name' => 'Oscar Piastri', 'team' => 'McLaren', 'points' => 124, 'wins' => 0, 'logo' => 'MCL'],
             ['pos' => 5, 'name' => 'Carlos Sainz', 'team' => 'Ferrari', 'points' => 108, 'wins' => 1, 'logo' => 'FER'],
             ['pos' => 6, 'name' => 'George Russel', 'team' => 'RG Racing', 'points' => 98, 'wins' => 0, 'logo' => 'RGR'],
             ['pos' => 7, 'name' => 'Lewis Hamilton', 'team' => 'Ferrari', 'points' => 85, 'wins' => 0, 'logo' => 'FER'],
             ['pos' => 8, 'name' => 'Sergio Perez', 'team' => 'Red Bull', 'points' => 74, 'wins' => 0, 'logo' => 'RBR'],
         ];

         $constructorStandings = [
             ['pos' => 1, 'name' => 'RG Racing', 'points' => 284, 'wins' => 4, 'color' => '#FF002E'],
             ['pos' => 2, 'name' => 'Ferrari', 'points' => 260, 'wins' => 3, 'color' => '#FF1801'],
             ['pos' => 3, 'name' => 'McLaren', 'points' => 269, 'wins' => 1, 'color' => '#FF8700'],
             ['pos' => 4, 'name' => 'Red Bull Racing', 'points' => 152, 'wins' => 0, 'color' => '#3671C6'],
             ['pos' => 5, 'name' => 'Mercedes', 'points' => 114, 'wins' => 0, 'color' => '#00A19B'],
         ];

         return view('standings.index', compact('team', 'driverStandings', 'constructorStandings', 'sponsorsByTier'));
     }

      public function corporate(): View
      {
          $team = Team::first();
          $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
          return view('about.corporate', compact('team', 'sponsorsByTier'));
      }

      public function sustainability(): View
      {
          $team = Team::first();
          $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
          return view('about.sustainability', compact('team', 'sponsorsByTier'));
      }

       public function mediaCentre(): View
       {
           $team = Team::first();
           $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
           return view('about.media-centre', compact('team', 'sponsorsByTier'));
       }

       public function academy(): View
       {
           $team = Team::first();
           $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
           return view('about.academy', compact('team', 'sponsorsByTier'));
       }

      public function news(): View
      {
          $team = Team::first();
          $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
          $articles = \App\Models\Article::orderBy('published_at', 'desc')->get();
          return view('about.news', compact('team', 'sponsorsByTier', 'articles'));
      }

      public function magazine(): View
      {
          $team = Team::first();
          $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
          return view('about.magazine', compact('team', 'sponsorsByTier'));
      }

      public function history(): View
      {
          $team = Team::first();
          $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
          return view('about.history', compact('team', 'sponsorsByTier'));
      }

        public function joinUs(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('about.join-us', compact('team', 'sponsorsByTier'));
        }

        public function shop(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('shop.index', compact('team', 'sponsorsByTier'));
        }

        public function partners(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('about.partners', compact('team', 'sponsorsByTier'));
        }

       public function showLogin(): View
       {
           $team = Team::first();
           $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
           return view('auth.login', compact('team', 'sponsorsByTier'));
       }

       public function login(\Illuminate\Http\Request $request)
       {
           $credentials = $request->validate([
               'email' => ['required', 'email'],
               'password' => ['required'],
           ]);

           if (\Illuminate\Support\Facades\Auth::attempt($credentials)) {
               $request->session()->regenerate();
               return redirect()->intended('/paddock-club');
           }

           return back()->withErrors([
               'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
           ])->onlyInput('email');
       }

       public function showRegister(): View
       {
           $team = Team::first();
           $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
           return view('auth.register', compact('team', 'sponsorsByTier'));
       }

       public function register(\Illuminate\Http\Request $request)
       {
           $data = $request->validate([
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
               'password' => ['required', 'min:8', 'confirmed'],
           ]);

           $user = \App\Models\User::create([
               'name' => $data['name'],
               'email' => $data['email'],
               'password' => \Illuminate\Support\Facades\Hash::make($data['password']),
           ]);

           \Illuminate\Support\Facades\Auth::login($user);

           return redirect('/paddock-club');
       }

       public function logout(\Illuminate\Http\Request $request)
       {
           \Illuminate\Support\Facades\Auth::logout();
           $request->session()->invalidate();
           $request->session()->regenerateToken();
           return redirect('/');
       }

       /**
        * POST /paddock-club/book
        */
       public function bookTicket(\Illuminate\Http\Request $request)
       {
           $data = $request->validate([
               'race_schedule_id' => ['required', 'exists:race_schedules,id'],
               'ticket_tier'      => ['required', 'in:paddock,garage,royal'],
               'quantity'         => ['required', 'integer', 'min:1', 'max:10'],
           ]);

           $prices = [
               'paddock' => 8500000,
               'garage'  => 12000000,
               'royal'   => 18500000,
           ];

           $pricePerTicket = $prices[$data['ticket_tier']];
           $totalPrice = $pricePerTicket * $data['quantity'];
           $bookingCode = 'RGR-' . strtoupper(\Illuminate\Support\Str::random(3)) . '-' . rand(1000, 9999);

           $race = \App\Models\RaceSchedule::find($data['race_schedule_id']);

           \App\Models\Ticket::create([
               'user_id'          => \Illuminate\Support\Facades\Auth::id(),
               'race_schedule_id' => $data['race_schedule_id'],
               'event_name'       => 'Formula 1 ' . $race->grand_prix_name,
               'ticket_tier'      => $data['ticket_tier'],
               'quantity'         => $data['quantity'],
               'total_price'      => $totalPrice,
               'status'           => 'Approved', // Auto-approve for instant premium interactive gratification
               'booking_code'     => $bookingCode,
           ]);

           return redirect()->route('dashboard')->with('success', 'Reservasi VIP Paddock Club Anda berhasil dikonfirmasi! Tiket digital Anda telah diterbitkan.');
       }

       /**
        * GET /dashboard
        */
       public function dashboard(): View
       {
           $team = Team::first();
           $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
           $tickets = \App\Models\Ticket::where('user_id', \Illuminate\Support\Facades\Auth::id())
               ->with('raceSchedule')
               ->orderBy('created_at', 'desc')
               ->get();

            return view('auth.dashboard', compact('team', 'sponsorsByTier', 'tickets'));
        }

        /**
         * GET /nascar
         */
        public function nascar(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('racing.nascar', compact('team', 'sponsorsByTier'));
        }

        /**
         * GET /gt-world-challenge/europe
         */
        public function gtwce(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('racing.gtwce', compact('team', 'sponsorsByTier'));
        }

        /**
         * GET /gt-world-challenge/asia
         */
        public function gtwca(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('racing.gtwca', compact('team', 'sponsorsByTier'));
        }

        public function placeOrder(\Illuminate\Http\Request $request)
        {
            $data = $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'customer_phone' => 'required|string|max:50',
                'shipping_address' => 'required|string',
                'shipping_courier' => 'required|string',
                'shipping_cost' => 'required|numeric',
                'payment_method' => 'required|string',
                'promo_code' => 'nullable|string',
                'subtotal' => 'required|numeric',
                'discount' => 'required|numeric',
                'total' => 'required|numeric',
                'cart_items' => 'required|string' // JSON string
            ]);

            $items = json_decode($data['cart_items'], true);

            // Validate that cart items are a non-empty array before any DB writes
            if (!is_array($items) || empty($items)) {
                return back()->withErrors(['cart' => 'Keranjang belanja tidak valid.']);
            }

            // TODO (production): Recalculate subtotal, discount, and total server-side
            // by fetching current prices from the products table for each item in $items.
            // Never trust price values sent from the client to prevent price tampering.

            return DB::transaction(function () use ($data, $items) {
                $invoice = 'INV-RGR-' . date('Ymd') . '-' . rand(1000, 9999);

                $order = \App\Models\Order::create([
                    'user_id' => \Illuminate\Support\Facades\Auth::id(),
                    'customer_name' => $data['customer_name'],
                    'customer_email' => $data['customer_email'],
                    'customer_phone' => $data['customer_phone'],
                    'shipping_address' => $data['shipping_address'],
                    'shipping_courier' => $data['shipping_courier'],
                    'shipping_cost' => $data['shipping_cost'],
                    'payment_method' => $data['payment_method'],
                    'promo_code' => $data['promo_code'],
                    'subtotal' => $data['subtotal'],
                    'discount' => $data['discount'],
                    'total' => $data['total'],
                    'status' => 'Pending',
                    'invoice_number' => $invoice
                ]);

                foreach ($items as $item) {
                    \App\Models\OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['id'] ?? null,
                        'product_name' => $item['name'],
                        'price' => $item['price'],
                        'qty' => $item['qty'],
                        'custom_info' => $item['customInfo'] ?? null
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'order_id' => $order->id,
                    'redirect_url' => route('checkout.success', $order->id)
                ]);
            });
        }

        public function checkoutSuccess($id): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);

            // IDOR fix: ensure the order belongs to the currently authenticated user
            // so that one user cannot view another user's order by guessing the order ID.
            $order = \App\Models\Order::with('items')
                ->where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            return view('shop.success', compact('team', 'sponsorsByTier', 'order'));
        }

        public function indycar(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('racing.indycar', compact('team', 'sponsorsByTier'));
        }

        public function wrc(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('racing.wrc', compact('team', 'sponsorsByTier'));
        }

        public function achievements(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('about.achievements', compact('team', 'sponsorsByTier'));
        }

        public function partnership(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('about.partnership', compact('team', 'sponsorsByTier'));
        }

        public function ewc(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            $riders = \App\Models\Driver::where('category', 'EWC')->get();
            $bike = \App\Models\Car::where('category', 'EWC')->first();
            return view('racing.ewc', compact('team', 'sponsorsByTier', 'riders', 'bike'));
        }

        public function formulaE(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            $drivers = \App\Models\Driver::where('category', 'FormulaE')->get();
            $car = \App\Models\Car::where('category', 'FormulaE')->first();
            return view('racing.formulae', compact('team', 'sponsorsByTier', 'drivers', 'car'));
        }

        public function checkoutV2(): View
        {
            $team = Team::first();
            $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
            return view('shop.checkout-v2', compact('team', 'sponsorsByTier'));
        }
}
