# buffett-indicator-plugin
 buffett-indicator-plugin


Buffett Indicator WordPress Plugin
Overview
The Buffett Indicator WordPress Plugin provides three independent shortcodes to display key financial metrics: the Buffett Indicator, the Total Market Capitalization, and the GDP of the U.S. economy. These shortcodes can be easily embedded into any WordPress post or page to present these financial indicators.

Shortcodes
1. Buffett Indicator
Shortcode: [buffett_indicator]

Description: Displays the Buffett Indicator as a percentage. The Buffett Indicator is calculated as the ratio of the total U.S. market capitalization to the U.S. GDP, multiplied by 100.

Example Usage:

plaintext
Copy code
[buffett_indicator]
Output Example:

sql
Copy code
Buffett Indicator: 200.45%
2. Total Market Cap
Shortcode: [buffett_total_market_cap]

Description: Displays the total U.S. market capitalization, retrieved from the Wilshire 5000 index.

Example Usage:

plaintext
Copy code
[buffett_total_market_cap]
Output Example:

mathematica
Copy code
Total Market Cap: 45,000.00
3. GDP
Shortcode: [buffett_gdp]

Description: Displays the U.S. GDP, retrieved from the FRED API.

Example Usage:

plaintext
Copy code
[buffett_gdp]
Output Example:

makefile
Copy code
GDP: 21,000.00
Editing the Formatting
The plugin outputs the values wrapped in HTML <div> and <p> tags with specific class names for each metric. You can edit the formatting by adding custom CSS to your theme or by modifying the plugin's output directly in the PHP files.

Customizing with CSS
You can add custom CSS to your theme's stylesheet to modify the appearance of each metric. Below are the class names associated with each metric:

Buffett Indicator: .buffett-indicator
Total Market Cap: .total-market-cap
GDP: .gdp
Example CSS:

css
Copy code
.buffett-indicator {
    font-size: 1.5em;
    color: #FF5733;
}

.total-market-cap {
    font-size: 1.2em;
    color: #33C3FF;
}

.gdp {
    font-size: 1.2em;
    color: #28A745;
}
Modifying the Output in PHP
If you prefer to modify the output directly in the plugin's code, you can edit the respective functions in the Buffett_Indicator class located in the plugin's main PHP file.

Example:

To change the way the Buffett Indicator is displayed, locate the display_buffett_indicator() function and adjust the HTML and PHP code as needed.

php
Copy code
public function display_buffett_indicator() {
    try {
        $buffett_api = new Buffett_API();
        $total_market_cap_index = $buffett_api->fetch_wilshire5000_index();
        $gdp = $buffett_api->fetch_gdp();
        $buffett_indicator = $this->calculate_buffett_indicator($total_market_cap_index, $gdp);

        return '<div class="buffett-indicator"><p>Buffett Indicator: ' . number_format($buffett_indicator, 2) . '%</p></div>';

    } catch (Exception $e) {
        return '<p>Error calculating the Buffett Indicator: ' . esc_html($e->getMessage()) . '</p>';
    }
}
Installation
Upload the Plugin Files: Upload the buffett-indicator-plugin directory to the /wp-content/plugins/ directory of your WordPress site.
Activate the Plugin: Activate the plugin through the 'Plugins' menu in WordPress.
Use the Shortcodes: Add the shortcodes [buffett_indicator], [buffett_total_market_cap], or [buffett_gdp] to any post or page to display the corresponding financial metric.
Troubleshooting
If the shortcodes are not displaying the expected values or you encounter any errors, please check the following:

Ensure that your API keys (e.g., for FRED) are correctly configured.
Check the PHP error logs for any issues related to API requests.
Verify that your theme or any other plugins are not conflicting with the shortcode output.
For additional support, please refer to the WordPress plugin documentation or contact the developer.