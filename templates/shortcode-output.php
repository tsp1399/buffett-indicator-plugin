<?php
// Display the Buffett Indicator in a formatted way
echo '<div class="buffett-indicator">';
echo '<p>Buffett Indicator: ' . number_format($buffett_indicator, 2) . '%</p>';
echo '</div>';
?>

<?php
// Display the Total Market Cap in a formatted way
echo '<div class="total-market-cap">';
echo '<p>Total Market Cap: ' . number_format($total_market_cap_index, 2) . '</p>';
echo '</div>';
?>

<?php
// Display the GDP in a formatted way
echo '<div class="gdp">';
echo '<p>GDP: ' . number_format($gdp, 2) . '</p>';
echo '</div>';
?>
