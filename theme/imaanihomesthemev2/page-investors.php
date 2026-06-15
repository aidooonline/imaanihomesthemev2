<?php
defined('ABSPATH') || exit;
get_header();
the_post();

// Investor FAQ data (verified from supplied content; em-dash free)
$inv_faqs = [
    ['Can foreigners legally own property in Ghana?', 'Yes. Ghana allows foreign nationals to legally purchase and own real estate through leasehold structures. Ghanaian citizens hold leaseholds of up to 99 years; foreign nationals hold 50-year leaseholds, renewable and fully transferable.'],
    ['What currency are prices and rental income denominated in?', 'All Imaani Homes unit prices are denominated in USD. Rental income from corporate tenants, expatriates, and most diaspora buyers is collected in USD, so your returns are benchmarked against the world\'s reserve currency, not subject to local inflation or cedi volatility.'],
    ['Do I need to be in Ghana to purchase a property?', 'No. The entire purchase process, from reservation and legal review to Sales Agreement signing, stage payments, and pre-handover inspection, can be completed remotely. Many Imaani buyers have collected their keys without having visited the property beforehand.'],
    ['What taxes apply to property investment in Ghana?', 'Rental income tax is 8% for resident landlords and 15% for non-residents. Our team can walk you through the full picture for your situation before you commit.'],
    ['What is Imaani Homes\' delivery track record?', 'Every Imaani development to date has been completed on or before the scheduled handover date. JAK Royale and The Ivy Townhomes, both fully sold out, were delivered on time, to specification, with zero amendments to what was committed at reservation.'],
    ['Can I get financing or a mortgage for a Ghana property?', 'GHS-denominated mortgages carry rates of 22 to 30% annually, generally not viable for investment purposes. USD-denominated loans from select banks run at 10 to 12% annually. Most investors purchase in cash via our milestone-linked payment structure.'],
    ['Who manages the property after handover?', 'Imaani Homes connects buyers at handover with vetted property management partners who handle both short-let and long-let operations: tenant sourcing, rent collection, maintenance, utility management, housekeeping, and monthly owner reporting.'],
    ['Can I repatriate my rental income and profits from Ghana?', 'Yes. Ghana has no restrictions on the repatriation of rental income or sale proceeds by foreign investors. Profits, dividends, and capital gains can be transferred abroad freely after applicable taxes.'],
    ['What is the minimum investment entry point?', 'Studio apartments represent the lowest entry point and the highest yield percentage, the most capital-efficient investment per dollar deployed. Imaani builds across a range of prime Accra addresses, each with its own entry pricing.'],
];

// FAQPage schema
$faq_schema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => []];
foreach ($inv_faqs as $qa) {
    $faq_schema['mainEntity'][] = ['@type' => 'Question', 'name' => $qa[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $qa[1]]];
}
echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";

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
      <p class="abx-hero__lead"><?php echo esc_html(imaani_field('imaani_inv_lead', 'Imaani Homes develops luxury residential properties in Accra\'s most sought-after addresses, built to attract the right tenants, generate consistent yields, and appreciate over time. Two sold out. Two active. Zero late deliveries.')); ?></p>
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
          <p>Imaani Homes is an Accra-based luxury real estate developer with a singular focus: building the right property in the right address and delivering it exactly as promised. Since 2019 we have completed four developments across Accra's prime residential belt, two fully sold out, two actively selling, with a zero-late-delivery record across every project.</p>
          <p>Ghana's stable democracy, surging foreign direct investment, AfCFTA headquarters presence, and chronic housing deficit of 1.8 million units create the conditions for one of Africa's most compelling real estate investment markets. <strong>Prime Accra delivers 8 to 11% net rental yields, two to three times what London or Nairobi offer,</strong> with USD-denominated returns that protect investors from local currency movement.</p>
        </div>
        <div class="abx-prose">
          <p>With Imaani Homes, you are not just buying property. You are securing a tangible, income-generating asset in one of Africa's fastest-recovering economies, backed by a developer with a track record that speaks for itself.</p>
          <p>This is the difference between buying into a promise and buying into a record. Two developments delivered and sold out. Two selling now. Every one handed over on the date committed at reservation.</p>
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
          ['1.8M', 'Unit Housing Deficit', 'Ghana\'s housing shortfall creates structural demand that will take decades to close. In prime Accra, land scarcity keeps quality supply permanently constrained, giving landlords consistent pricing power.'],
          ['$2.6B', 'FDI Into Ghana in 2025', 'Foreign direct investment surged to $2.61 billion in 2025, more than four times the 2024 figure. Every executive deployed to Accra by a multinational needs a quality furnished home. That is your tenant.'],
          ['AfCFTA', 'Africa\'s Trade Headquarters', 'Accra hosts the permanent secretariat of the African Continental Free Trade Area: 1.4 billion people, $3.4 trillion in GDP. The executives running continental operations live in the addresses Imaani builds in.'],
          ['$3B', 'Annual Diaspora Remittances', 'Ghana receives approximately $3 billion in annual diaspora capital. A significant portion flows into prime real estate, creating a deep resale market and a liquid exit for investors when they are ready.'],
          ['6.3%', 'GDP Growth, H1 2025', 'Ghana\'s fastest economic expansion since 2019. Fitch, Moody\'s, and S&P all upgraded Ghana\'s credit in 2025. Inflation fell to 3.2% by March 2026. The recovery is in the data, not a forecast.'],
          ['6&ndash;10%', 'Vacancy Rate, Prime Accra', 'Quality buildings in Accra\'s prime belt run vacancy rates of just 6 to 10%. Corporate leases are regularly signed 1 to 3 years in advance, removing vacancy risk for well-managed units almost entirely.'],
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

  <!-- YIELDS STATEMENT -->
  <section class="abx-why">
    <div class="container abx-why__inner">
      <span class="abx-eyebrow">The Investor's Opportunity</span>
      <h2 class="abx-display">Exceptional returns from a market<em>London investors never had access to.</em></h2>
      <p>Imaani Homes properties generate <strong>8 to 11% net rental yields</strong> in the prime Accra market, among the strongest returns in Sub-Saharan Africa for quality residential assets. Combined with 8 to 10% annual capital appreciation, the total investment case is compelling by any global benchmark.</p>
      <p>Our competitive rental yields, combined with professional property management and USD-denominated income, deliver consistent, hassle-free returns: the ideal balance of immediate rental income and long-term capital appreciation in one of Africa's most resilient prime property markets.</p>
    </div>
  </section>

  <!-- FOUR WAYS TO INVEST -->
  <section class="abx-sec">
    <div class="container">
      <span class="abx-eyebrow">Investment Models</span>
      <h2 class="abx-display abx-display--left">Four ways to invest<em>with Imaani Homes.</em></h2>
      <p class="abx-lead">Your strategy determines which model is right for you. Our sales team will help you match the approach to the unit, the development, and your financial goals.</p>
      <div class="abx-models">
        <?php
        $models = [
          ['01', 'Short-Let & Corporate Rental', 'Furnish to a five-star standard. List on Airbnb, Booking.com, and corporate relocation platforms. Target business travellers, diaspora visitors, and expatriates on short assignments who pay per night in USD. Top-performing hosts in prime Accra achieve 60 to 75% occupancy at $80 to $280 per night. Break-even occupancy is just 20 to 30%, meaning the strategy holds even in the softest months of the year.'],
          ['02', 'Long Let, Corporate & Expat', 'The most predictable income strategy. Long-term leases to corporate tenants, multinationals, embassies, NGOs, who pay in USD on 12-month contracts, often agreed 1 to 3 years in advance. Near-zero vacancy. No nightly management. At 8% annual capital growth, a $200,000 unit becomes a $293,000 asset in five years, before a single dollar of rent is counted.'],
          ['03', 'Off-Plan Purchase & Resale', 'Reserve at off-plan pricing, the widest gap between entry and market value. Hold through construction. Resell at or before handover. Prime Accra developments have recorded 70 to 90% price appreciation over five years. Imaani buyers who reserved JAK Royale and The Ivy off-plan captured a significant portion of that between reservation and completion. A clean capital gain.'],
          ['04', 'Live Part-Time, Earn the Rest', 'Occupy the unit during your visits. Short-let it when you are away. The rental income covers your service charge and often your financing costs, while the asset appreciates whether you are in Ghana or not. The entire purchase process can be handled remotely. You choose the address. We take care of everything else.'],
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

  <!-- DAY ONE / MANAGEMENT FEATURES -->
  <section class="abx-sec abx-sec--stone">
    <div class="container">
      <span class="abx-eyebrow">Full-Service Rental Management</span>
      <h2 class="abx-display abx-display--left">Your asset earns<em>from day one.</em></h2>
      <p class="abx-lead">At handover, Imaani connects every investor with vetted property management partners who handle operations completely, so your unit earns before you have unpacked the keys.</p>
      <div class="abx-diff">
        <?php
        $feats = [
          ['Check-In & Check-Out', 'Seamless guest and tenant arrival and departure management for both short-let and long-let arrangements.'],
          ['Housekeeping & Laundry', 'Professional cleaning and linen services included in short-let management. Standards maintained to five-star expectation.'],
          ['Internet & Cable TV', 'High-speed connectivity and premium TV packages, non-negotiable for corporate and expatriate tenants.'],
          ['24-Hour Support Line', 'Round-the-clock management hotline for tenant needs and building issues. Nothing sits unresolved.'],
          ['Full Apartment Management', 'Complete property oversight: maintenance, utilities, tenant communication, and monthly owner reporting.'],
          ['Rent Collection & Reporting', 'USD rent collected and transferred to your nominated account with monthly statements. All transparent.'],
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
      <p class="abx-lead">Your payments are tied to documented construction milestones. Nothing is requested without evidence of progress. This structure protects your capital and keeps our delivery obligations enforced by the payment schedule itself.</p>
      <div class="abx-plans">
        <div class="abx-plan">
          <span class="abx-plan__label">Standard Off-Plan</span>
          <ul class="abx-plan__rows">
            <li><span>Reservation Deposit</span><strong>$5,000</strong></li>
            <li><span>Initial Deposit (on SPA)</span><strong>25%</strong></li>
            <li><span>Stage Payments</span><strong>50%</strong></li>
            <li><span>Balance on Handover</span><strong>25%</strong></li>
          </ul>
          <p>Reservation deposit is offset against the purchase price. Stage payments tied to documented construction progress with photographic updates at each milestone.</p>
        </div>
        <div class="abx-plan abx-plan--accent">
          <span class="abx-plan__label">Bespoke Payment Plan</span>
          <ul class="abx-plan__rows">
            <li><span>Reservation Deposit</span><strong>$5,000</strong></li>
            <li><span>Initial Deposit (on SPA)</span><strong>30%</strong></li>
            <li><span>Extended Stage Payments</span><strong>Flexible</strong></li>
            <li><span>Balance on Handover</span><strong>Balance</strong></li>
          </ul>
          <p>Special arrangements considered case by case for qualifying buyers. All payments via international bank transfer in USD. Contact our team to discuss your circumstances.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ROI TABLES -->
  <section class="abx-sec abx-sec--stone">
    <div class="container">
      <span class="abx-eyebrow">Return on Investment</span>
      <h2 class="abx-display abx-display--left">Rental income<em>projections.</em></h2>
      <p class="abx-lead">Comprehensive ROI analysis across both rental strategies. Figures are indicative and based on current prime Accra market rates for furnished, professionally managed apartments. Our sales team will provide projections specific to the unit and development you are considering.</p>

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

  <!-- FAQ -->
  <section class="abx-sec">
    <div class="container container--narrow">
      <span class="abx-eyebrow">Investor FAQ</span>
      <h2 class="abx-display abx-display--left">Questions investors<em>always ask us.</em></h2>
      <p class="abx-lead">Everything you need to know before making your investment decision. If your question isn't answered here, our sales team responds within 24 hours.</p>
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
