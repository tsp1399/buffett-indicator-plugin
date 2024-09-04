<?php

class Buffett_Indicator {

    public function run() {
        add_shortcode('buffett_indicator', [$this, 'display_buffett_indicator']);
        add_shortcode('buffett_total_market_cap', [$this, 'display_total_market_cap']);
        add_shortcode('buffett_gdp', [$this, 'display_gdp']);
    }

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

    public function display_total_market_cap() {
        try {
            $buffett_api = new Buffett_API();
            $total_market_cap_index = $buffett_api->fetch_wilshire5000_index();

            return '<div class="total-market-cap"><p>Total Market Cap: ' . number_format($total_market_cap_index, 2) . '</p></div>';

        } catch (Exception $e) {
            return '<p>Error retrieving Total Market Cap: ' . esc_html($e->getMessage()) . '</p>';
        }
    }

    public function display_gdp() {
        try {
            $buffett_api = new Buffett_API();
            $gdp = $buffett_api->fetch_gdp();

            return '<div class="gdp"><p>GDP: ' . number_format($gdp, 2) . '</p></div>';

        } catch (Exception $e) {
            return '<p>Error retrieving GDP: ' . esc_html($e->getMessage()) . '</p>';
        }
    }

    private function calculate_buffett_indicator($total_market_cap_index, $gdp) {
        if ($gdp > 0) {
            return ($total_market_cap_index / $gdp) * 100;  // Correct multiplier here
        } else {
            throw new Exception('GDP should be a positive number.');
        }
    }
}
