<?php
defined('ABSPATH') || exit;
get_header();
the_post();

// Investor FAQ data (verified from supplied content; em-dash free)
$inv_faqs = [
    ['Can foreigners legally own property in Ghana?', 'Yes, through leasehold. Citizens hold up to 99 years; foreign nationals hold 50-year leaseholds, renewable and fully transferable.'],
    ['What currency are prices and rental income denominated in?', 'USD. Prices and most rental income are in dollars, so your returns are benchmarked against the reserve currency, not cedi volatility.'],
    ['Do I need to be in Ghana to purchase a property?', 'No. The whole process, from reservation to signing, payments and inspection, can be done remotely. Many buyers collect keys having never visited.'],
    ['What taxes apply to property investment in Ghana?', 'Rental income tax is 8% for residents, 15% for non-residents. Our team walks you through the full picture before you commit.'],
    ['What is Imaani Homes\' delivery track record?', 'Every development delivered on or before its handover date. JAK Royale and The Ivy, both sold out, were delivered on time, to spec, with zero amendments.'],
    ['Can I get financing or a mortgage for a Ghana property?', 'Cedi mortgages run 22 to 30%, rarely viable. USD loans from select banks run 10 to 12%. Most investors buy in cash via our milestone payment plan.'],
    ['Who manages the property after handover?', 'At handover we connect you with vetted partners who handle everything: tenants, rent, maintenance, utilities, housekeeping and monthly reporting.'],
    ['Can I repatriate my rental income and profits from Ghana?', 'Yes. Ghana places no restrictions on repatriating rental income or sale proceeds. Profits and gains transfer abroad freely after applicable taxes.'],
    ['What is the minimum investment entry point?', 'Studios are the lowest entry and the highest yield, the most capital-efficient per dollar. Each prime address carries its own entry pricing.'],
];

// FAQPage schema
$faq_schema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => []];
foreach ($inv_faqs as $qa) {
    $faq_schema['mainEntity'][] = ['@type' => 'Question', 'name' => $qa[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $qa[1]]];
}
echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";

// Resolve a library image by slug for inline visuals
$abx_pic_url = function (string $slug, string $size = 'full'): string {
    $found = get_posts(['post_type' => 'attachment', 'name' => $slug, 'post_status' => 'inherit', 'posts_per_page' => 1, 'fields' => 'ids']);
    if (!$found) return '';
    $src = wp_get_attachment_image_src((int) $found[0], $size);
    return $src ? $src[0] : '';
};

$inv_img = has_post_thumbnail() ? get_the_post_thumbnail(null, 'imaani-hero', ['loading' => 'eager', 'class' => 'abx-hero__img']) : '';
if (!$inv_img) {
    foreach (imaani_projects() as $k => $proj) {
        $inv_img = imaani_project_image($k, $proj, 'imaani-hero');
        if ($inv_img) { $inv_img = str_replace('class="', 'class="abx-hero__img ', $inv_img); break; }
    }
}
?>

<div class="abx">

  <!-- HERO -->
  <section class="abx-hero">
    <?php if ($inv_img) : ?><div class="abx-hero__media"><?php echo $inv_img; // phpcs:ignore ?></div><?php endif; ?>
    <div class="abx-hero__scrim" aria-hidden="true"></div>
    <div class="container abx-hero__inner">
      <span class="abx-eyebrow"><?php echo esc_html(imaani_field('imaani_inv_eyebrow', 'Investment Opportunity · Accra, Ghana')); ?></span>
      <h1 class="abx-hero__title"><?php echo esc_html(imaani_field('imaani_inv_title', 'Your gateway to premium real estate returns in Accra.')); ?></h1>
      <p class="abx-hero__lead"><?php echo esc_html(imaani_field('imaani_inv_lead', 'Luxury homes in Accra\'s best addresses, built to attract premium tenants and appreciate. Two sold out. Two active. Zero late deliveries.')); ?></p>
      <div class="abx-hero__btns">
        <a class="btn btn--primary btn--lg" href="<?php echo esc_url(home_url('/contact/')); ?>">Speak to an Advisor</a>
        <a class="btn btn--inverse" href="<?php echo esc_url(home_url('/projects/')); ?>">View Developments</a>
      </div>
    </div>
  </section>

  <!-- HERO STATS -->
  <section class="abx-stats" aria-label="Investment headline figures">
    <div class="abx-stats__grid">
      <div class="abx-stat"><span class="abx-stat__n">8<sup>&ndash;</sup>11<sup>%</sup></span><span class="abx-stat__l">Net Rental Yield</span></div>
      <div class="abx-stat"><span class="abx-stat__n">8<sup>&ndash;</sup>10<sup>%</sup></span><span class="abx-stat__l">Annual Capital Appreciation</span></div>
      <div class="abx-stat"><span class="abx-stat__n">100<sup>%</sup></span><span class="abx-stat__l">On-Time Delivery Record</span></div>
      <div class="abx-stat"><span class="abx-stat__n">USD</span><span class="abx-stat__l">Denominated Returns</span></div>
    </div>
  </section>

  <!-- ABOUT THE OPPORTUNITY -->
  <section class="abx-sec">
    <div class="container">
      <span class="abx-eyebrow">About Imaani Homes</span>
      <h2 class="abx-display abx-display--left">Invest in Accra's future.<em>With a developer who delivers.</em></h2>
      <?php $inv_body = imaani_field('imaani_inv_body', ''); if (trim($inv_body)) : ?>
        <div class="abx-prose"><?php echo wp_kses_post(wpautop($inv_body)); ?></div>
      <?php else : ?>
      <div class="abx-story">
        <div class="abx-prose">
          <p>Since 2019 we have completed four developments across Accra's prime belt: two sold out, two selling, every one delivered on time. We build the right property in the right address and hand it over exactly as promised.</p>
        </div>
        <div class="abx-prose">
          <p><strong>Prime Accra delivers 8 to 11% net rental yields, two to three times London or Nairobi,</strong> in USD. You are not buying a promise. You are buying a tangible, income-generating asset backed by a record that speaks for itself.</p>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- DEMAND DRIVERS -->
  <section class="abx-sec abx-sec--stone">
    <div class="container">
      <span class="abx-eyebrow">Demand That Doesn't Stop</span>
      <h2 class="abx-display abx-display--left">Why Accra's rental market<em>keeps performing.</em></h2>
      <p class="abx-lead">Accra's prime residential market is underpinned by structural demand drivers that are not seasonal, not cyclical, and not dependent on any single industry. They compound, and they are growing.</p>
      <div class="abx-drivers">
        <?php
        $drivers = [
          ['1.8M', 'Unit Housing Deficit', 'A shortfall that will take decades to close. Land scarcity keeps prime supply constrained, giving landlords lasting pricing power.'],
          ['$2.6B', 'FDI Into Ghana in 2025', 'FDI surged past $2.6 billion in 2025, four times 2024. Every executive a multinational sends to Accra needs a furnished home. That is your tenant.'],
          ['AfCFTA', 'Africa\'s Trade Headquarters', 'Accra hosts the AfCFTA secretariat: 1.4 billion people, $3.4 trillion in GDP. The executives running it live in the addresses we build in.'],
          ['$3B', 'Annual Diaspora Remittances', 'Around $3 billion flows home each year, much of it into prime property, creating a deep resale market and a liquid exit when you are ready.'],
          ['6.3%', 'GDP Growth, H1 2025', 'The fastest expansion since 2019. Fitch, Moody\'s and S&P all upgraded Ghana in 2025; inflation fell to 3.2%. The recovery is in the data.'],
          ['6&ndash;10%', 'Vacancy Rate, Prime Accra', 'Prime buildings run just 6 to 10% vacancy. Corporate leases are signed 1 to 3 years ahead, removing vacancy risk almost entirely.'],
        ];
        foreach ($drivers as $d) : ?>
          <div class="abx-driver">
            <span class="abx-driver__n"><?php echo wp_kses($d[0], ['sup' => []]); ?></span>
            <span class="abx-driver__t"><?php echo esc_html($d[1]); ?></span>
            <p><?php echo esc_html($d[2]); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


  <!-- INLINE CTA -->
  <section class="abx-cta">
    <div class="container abx-cta__inner">
      <div class="abx-cta__copy">
        <span class="abx-eyebrow">The Market Is Moving</span>
        <p class="abx-cta__text">The fundamentals are rare and they are compounding now. Speak to an advisor while off-plan pricing is still open.</p>
      </div>
      <a class="btn btn--primary btn--lg abx-cta__btn" href="/contact/">Speak to an Advisor</a>
    </div>
  </section>



  <!-- INLINE IMAGE -->
  <?php $u = $abx_pic_url('alexis-residences_final-stills_orastudio_-interior-_-living-area'); if ($u) : ?>
  <section class="abx-imgband" style="background-image:url('<?php echo esc_url($u); ?>')" role="img" aria-label="Luxury living interior at an Imaani Homes development in Accra">
    <div class="abx-imgband__scrim" aria-hidden="true"></div>
    <div class="container abx-imgband__inner">
      <p class="abx-imgband__cap">The standard that attracts premium, USD-paying tenants.</p>
    </div>
  </section>
  <?php endif; ?>

  <!-- YIELDS STATEMENT -->
  <section class="abx-why">
    <div class="container abx-why__inner">
      <span class="abx-eyebrow">The Investor's Opportunity</span>
      <h2 class="abx-display">Exceptional returns from a market<em>London investors never had access to.</em></h2>
      <p><strong>8 to 11% net rental yields plus 8 to 10% annual appreciation,</strong> among the strongest returns in Sub-Saharan Africa. With professional management and USD income, you get immediate cash flow and long-term capital growth, hands-free.</p>
    </div>
  </section>

  <!-- FOUR WAYS TO INVEST -->
  <section class="abx-sec">
    <div class="container">
      <span class="abx-eyebrow">Investment Models</span>
      <h2 class="abx-display abx-display--left">Four ways to invest<em>with Imaani Homes.</em></h2>
      <p class="abx-lead">Your goals decide the model. Our team matches the approach to the right unit and development.</p>
      <div class="abx-models">
        <?php
        $models = [
          ['01', 'Short-Let & Corporate Rental', 'Furnish to a five-star standard and list on Airbnb, Booking.com and corporate platforms. Top hosts hit 60 to 75% occupancy at $80 to $280 a night, while break-even sits at just 20 to 30%.'],
          ['02', 'Long Let, Corporate & Expat', 'The most predictable strategy: 12-month USD leases to corporates, embassies and NGOs, often signed years ahead. Near-zero vacancy, and at 8% growth a $200,000 unit becomes $293,000 in five years before any rent.'],
          ['03', 'Off-Plan Purchase & Resale', 'Reserve at off-plan pricing, hold through construction, resell at or before handover. Prime Accra has recorded 70 to 90% appreciation over five years. JAK Royale and Ivy buyers captured much of it. A clean capital gain.'],
          ['04', 'Live Part-Time, Earn the Rest', 'Live in it on your visits, short-let it when away. The income covers your service charge and often your financing, while the asset appreciates regardless. Buy entirely remotely; you choose the address, we handle the rest.'],
        ];
        foreach ($models as $m) : ?>
          <div class="abx-model">
            <span class="abx-model__num"><?php echo esc_html($m[0]); ?></span>
            <div class="abx-model__body">
              <h3><?php echo esc_html($m[1]); ?></h3>
              <p><?php echo esc_html($m[2]); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


  <!-- INLINE CTA -->
  <section class="abx-cta abx-cta--dark">
    <div class="container abx-cta__inner">
      <div class="abx-cta__copy">
        <span class="abx-eyebrow">Match a Strategy to a Unit</span>
        <p class="abx-cta__text">Not sure which model fits your goals? We will map the right approach to the right unit in minutes.</p>
      </div>
      <a class="btn btn--primary btn--lg abx-cta__btn" href="/contact/">Request a Strategy Call</a>
    </div>
  </section>



  <!-- INLINE IMAGE -->
  <?php $u = $abx_pic_url('14_roof-top-pool-view-2'); if ($u) : ?>
  <section class="abx-imgband" style="background-image:url('<?php echo esc_url($u); ?>')" role="img" aria-label="Rooftop pool amenity at an Imaani Homes development">
    <div class="abx-imgband__scrim" aria-hidden="true"></div>
    <div class="container abx-imgband__inner">
      <p class="abx-imgband__cap">Rooftop amenities that command higher nightly and lease rates.</p>
    </div>
  </section>
  <?php endif; ?>

  <!-- DAY ONE / MANAGEMENT FEATURES -->
  <section class="abx-sec abx-sec--stone">
    <div class="container">
      <span class="abx-eyebrow">Full-Service Rental Management</span>
      <h2 class="abx-display abx-display--left">Your asset earns<em>from day one.</em></h2>
      <p class="abx-lead">At handover we connect you with vetted management partners who run everything, so your unit earns from day one.</p>
      <div class="abx-diff">
        <?php
        $feats = [
          ['Check-In & Check-Out', 'Seamless arrivals and departures for both short and long lets.'],
          ['Housekeeping & Laundry', 'Professional cleaning and linen, kept to a five-star standard.'],
          ['Internet & Cable TV', 'High-speed internet and premium TV, non-negotiable for corporate tenants.'],
          ['24-Hour Support Line', 'Round-the-clock management hotline for tenant needs and building issues. Nothing sits unresolved.'],
          ['Full Apartment Management', 'Full oversight: maintenance, utilities, tenants and monthly reporting.'],
          ['Rent Collection & Reporting', 'USD rent collected and sent to your account, with monthly statements.'],
        ];
        foreach ($feats as $f) : ?>
          <div class="abx-diff__card"><h3><?php echo esc_html($f[0]); ?></h3><p><?php echo esc_html($f[1]); ?></p></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- PAYMENT STRUCTURE -->
  <section class="abx-sec">
    <div class="container">
      <span class="abx-eyebrow">Developer Payment Structure</span>
      <h2 class="abx-display abx-display--left">Simple. Milestone-linked.<em>No surprises.</em></h2>
      <p class="abx-lead">Payments are tied to verified construction milestones. Nothing is asked without proof of progress, which protects your capital and keeps our delivery on the hook.</p>
      <div class="abx-plans">
        <div class="abx-plan">
          <span class="abx-plan__label">Standard Off-Plan</span>
          <ul class="abx-plan__rows">
            <li><span>Reservation Deposit</span><strong>$5,000</strong></li>
            <li><span>Initial Deposit (on SPA)</span><strong>25%</strong></li>
            <li><span>Stage Payments</span><strong>50%</strong></li>
            <li><span>Balance on Handover</span><strong>25%</strong></li>
          </ul>
          <p>Deposit offset against price. Stage payments tied to verified progress, with photos at each milestone.</p>
        </div>
        <div class="abx-plan abx-plan--accent">
          <span class="abx-plan__label">Bespoke Payment Plan</span>
          <ul class="abx-plan__rows">
            <li><span>Reservation Deposit</span><strong>$5,000</strong></li>
            <li><span>Initial Deposit (on SPA)</span><strong>30%</strong></li>
            <li><span>Extended Stage Payments</span><strong>Flexible</strong></li>
            <li><span>Balance on Handover</span><strong>Balance</strong></li>
          </ul>
          <p>Case-by-case for qualifying buyers. All payments in USD by bank transfer. Talk to our team.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- INLINE CTA -->
  <section class="abx-cta">
    <div class="container abx-cta__inner">
      <div class="abx-cta__copy">
        <span class="abx-eyebrow">Reserve Your Position</span>
        <p class="abx-cta__text">A $5,000 deposit secures off-plan pricing at Regalia, fully offset against your purchase.</p>
      </div>
      <a class="btn btn--primary btn--lg abx-cta__btn" href="/contact/">Start Your Reservation</a>
    </div>
  </section>



  <!-- INLINE IMAGE -->
  <?php $u = $abx_pic_url('alexis-residences-interior-_-kitchen-area'); if ($u) : ?>
  <section class="abx-imgband" style="background-image:url('<?php echo esc_url($u); ?>')" role="img" aria-label="Furnished kitchen interior at an Imaani Homes apartment">
    <div class="abx-imgband__scrim" aria-hidden="true"></div>
    <div class="container abx-imgband__inner">
      <p class="abx-imgband__cap">Furnished, managed, and earning from the day you receive the keys.</p>
    </div>
  </section>
  <?php endif; ?>

  <!-- ROI TABLES -->
  <section class="abx-sec abx-sec--stone">
    <div class="container">
      <span class="abx-eyebrow">Return on Investment</span>
      <h2 class="abx-display abx-display--left">Rental income<em>projections.</em></h2>
      <p class="abx-lead">Indicative figures for furnished, professionally managed units at current prime Accra rates. Your advisor will model the exact unit you are considering.</p>

      <h3 class="abx-table-title">Long Let, Furnished</h3>
      <div class="abx-table-wrap">
        <table class="abx-table">
          <thead><tr><th>Unit Type</th><th>Size (sqm)</th><th>Monthly (US$)</th><th>Service / Mo</th><th>Gross to Owner</th><th>&times; 12 Months</th><th>Net Yield</th></tr></thead>
          <tbody>
            <tr><td>Studio</td><td>38&ndash;42</td><td>$1,100</td><td>$100</td><td>$1,000</td><td>$12,000</td><td>~8.5%</td></tr>
            <tr><td>Studio Executive</td><td>45&ndash;50</td><td>$1,400</td><td>$130</td><td>$1,270</td><td>$15,240</td><td>~9.0%</td></tr>
            <tr><td>1 Bedroom</td><td>65&ndash;75</td><td>$1,800</td><td>$160</td><td>$1,640</td><td>$19,680</td><td>~8.2%</td></tr>
            <tr><td>1 Bedroom Executive</td><td>78&ndash;90</td><td>$2,200</td><td>$200</td><td>$2,000</td><td>$24,000</td><td>~8.0%</td></tr>
            <tr><td>2 Bedroom</td><td>100&ndash;120</td><td>$2,800</td><td>$240</td><td>$2,560</td><td>$30,720</td><td>~7.8%</td></tr>
            <tr><td>2 Bedroom Executive</td><td>125&ndash;140</td><td>$3,500</td><td>$300</td><td>$3,200</td><td>$38,400</td><td>~7.5%</td></tr>
            <tr><td>3 Bedroom / Penthouse</td><td>160&ndash;200</td><td>$5,000</td><td>$420</td><td>$4,580</td><td>$54,960</td><td>~7.0%</td></tr>
          </tbody>
        </table>
      </div>

      <h3 class="abx-table-title">Short Let, Furnished</h3>
      <div class="abx-table-wrap">
        <table class="abx-table">
          <thead><tr><th>Unit Type</th><th>Size (sqm)</th><th>Nightly</th><th>Nights / Mo</th><th>Gross Monthly</th><th>Net to Owner</th><th>&times; 12</th><th>Net Yield</th></tr></thead>
          <tbody>
            <tr><td>Studio</td><td>38&ndash;42</td><td>$80</td><td>20</td><td>$1,600</td><td>$1,200</td><td>$14,400</td><td>~10.5%</td></tr>
            <tr><td>Studio Executive</td><td>45&ndash;50</td><td>$100</td><td>20</td><td>$2,000</td><td>$1,500</td><td>$18,000</td><td>~11.0%</td></tr>
            <tr><td>1 Bedroom</td><td>65&ndash;75</td><td>$135</td><td>20</td><td>$2,700</td><td>$2,025</td><td>$24,300</td><td>~10.5%</td></tr>
            <tr><td>1 Bedroom Executive</td><td>78&ndash;90</td><td>$160</td><td>20</td><td>$3,200</td><td>$2,400</td><td>$28,800</td><td>~10.0%</td></tr>
            <tr><td>2 Bedroom</td><td>100&ndash;120</td><td>$200</td><td>20</td><td>$4,000</td><td>$3,000</td><td>$36,000</td><td>~9.5%</td></tr>
            <tr><td>2 Bedroom Executive</td><td>125&ndash;140</td><td>$240</td><td>20</td><td>$4,800</td><td>$3,600</td><td>$43,200</td><td>~9.0%</td></tr>
            <tr><td>3 Bedroom / Penthouse</td><td>160&ndash;200</td><td>$320</td><td>20</td><td>$6,400</td><td>$4,800</td><td>$57,600</td><td>~8.5%</td></tr>
          </tbody>
        </table>
      </div>
      <p class="abx-table-note">Charges and management estimated at 25% for short-let. Figures indicative; your advisor will model the specific unit and development.</p>
    </div>
  </section>


  <!-- INLINE CTA -->
  <section class="abx-cta abx-cta--dark">
    <div class="container abx-cta__inner">
      <div class="abx-cta__copy">
        <span class="abx-eyebrow">See Your Numbers</span>
        <p class="abx-cta__text">Get a projection built around the exact unit and development you are considering.</p>
      </div>
      <a class="btn btn--primary btn--lg abx-cta__btn" href="/contact/">Get My Projection</a>
    </div>
  </section>



  <!-- INLINE IMAGE -->
  <?php $u = $abx_pic_url('regalia-residence-aerial'); if ($u) : ?>
  <section class="abx-imgband" style="background-image:url('<?php echo esc_url($u); ?>')" role="img" aria-label="Aerial view of Regalia Residence at Airport Residential, Accra">
    <div class="abx-imgband__scrim" aria-hidden="true"></div>
    <div class="container abx-imgband__inner">
      <p class="abx-imgband__cap">Regalia Residence, Airport Residential. Now selling off-plan.</p>
    </div>
  </section>
  <?php endif; ?>

  <!-- FAQ -->
  <section class="abx-sec">
    <div class="container container--narrow">
      <span class="abx-eyebrow">Investor FAQ</span>
      <h2 class="abx-display abx-display--left">Questions investors<em>always ask us.</em></h2>
      <p class="abx-lead">The essentials before you decide. Anything else, our team replies within 24 hours.</p>
      <div class="faq-list" style="margin-top:var(--space-8)">
        <?php foreach ($inv_faqs as $i => $qa) : ?>
          <details class="faq-item"<?php echo 0 === $i ? ' open' : ''; ?>>
            <summary class="faq-item__q"><?php echo esc_html($qa[0]); ?></summary>
            <div class="faq-item__a"><p><?php echo esc_html($qa[1]); ?></p></div>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php get_template_part('parts/cta-final'); ?>

</div>

<?php get_footer(); ?>
