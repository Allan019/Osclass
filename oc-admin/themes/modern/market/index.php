<?php
    /**
     * Osclass – software for creating and publishing online classified advertising platforms
     *
     * Copyright (C) 2012 OSCLASS
     *
     * This program is free software: you can redistribute it and/or modify it under the terms
     * of the GNU Affero General Public License as published by the Free Software Foundation,
     * either version 3 of the License, or (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
     * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
     * See the GNU Affero General Public License for more details.
     *
     * You should have received a copy of the GNU Affero General Public
     * License along with this program. If not, see <http://www.gnu.org/licenses/>.
     */
    function addHelp() {
        echo '<p>' . __('Browse and download available Osclass plugins, from a constantly-updated selection. After downloading a plugin, you have to install it and configure it to get it up and running.') . '</p>';
    }
    osc_add_hook('help_box','addHelp');
    osc_current_admin_theme_path('market/header.php');
?>
<div>
    <h2 class="section-title"><?php _e('Recommended plugins for You'); ?></h2>
    <?php

    $marketPage = 0;
    $out    = osc_file_get_contents(osc_market_url('plugins')."page/".$marketPage);
    $array  = json_decode($out, true);
    $i = 0;
    foreach($array['plugins'] as $item){
        drawMarketItem($item);
        $i++;
        if($i == 6){
            break;
        }
    }
    ?>
    <h2 class="section-title"><?php _e('Recommended themes for You'); ?></h2>
    <?php

    $marketPage = 0;
    $out    = osc_file_get_contents(osc_market_url('themes')."page/".$marketPage);
    $array  = json_decode($out, true);
    $i = 0;
    foreach($array['themes'] as $item){
        drawMarketItem($item);
        $i++;
        if($i == 6){
            break;
        }
    }
    ?>
    <h2 class="section-title"><?php _e('Languages'); ?></h2>
</div>
<?php osc_current_admin_theme_path( 'parts/footer.php' ) ; ?>