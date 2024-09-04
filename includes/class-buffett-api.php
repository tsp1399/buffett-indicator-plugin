<?php

class Buffett_API {

    public function fetch_wilshire5000_index() {
        $response = wp_remote_get('https://query1.finance.yahoo.com/v8/finance/chart/%5EW5000');
        if (is_wp_error($response)) {
            throw new Exception('Failed to retrieve data from Yahoo Finance.');
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        $total_market_cap_index = $data['chart']['result'][0]['meta']['regularMarketPrice'];

        if ($total_market_cap_index <= 0) {
            throw new Exception('Total Market Cap Index should be a positive number.');
        }

        return $total_market_cap_index;
    }

    public function fetch_gdp() {
        $api_key = FRED_API_KEY;
        $response = wp_remote_get("https://api.stlouisfed.org/fred/series/observations?series_id=GDP&api_key=$api_key&file_type=json");
        
        if (is_wp_error($response)) {
            throw new Exception('Failed to retrieve data from FRED.');
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        $gdp = end($data['observations'])['value'];  // Fetch the latest GDP value

        if ($gdp <= 0) {
            throw new Exception('GDP should be a positive number.');
        }

        return $gdp;  // Convert GDP from billions to actual value
    }
}
