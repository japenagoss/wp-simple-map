<table class="form-table">
    <tbody>
        <tr>
            <th scope="row"><label class="wpsm_latitude"><?php _e('Latitude', 'wp_simple_map'); ?></label></th>
            <td><input type="text" name="wpsm_latitude" value="<?php echo esc_attr($latitude);?>"></td>
        </tr>
        <tr>
            <th scope="row"><label class="wpsm_longitude"><?php _e('Longitude', 'wp_simple_map'); ?></label></th>
            <td><input type="text" name="wpsm_longitude" value="<?php echo esc_attr($longitude);?>"></td>
        </tr>
    </tbody>
</table>