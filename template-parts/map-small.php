<?php

namespace MHM\SherborneRoad;

class MapSmall
{
    private $post_thumbnail = '';

    public function dump($var, $die = false)
    {
        echo '<pre>' . print_r($var, 1) . '</pre>';
        if ($die) {
            die();
        }
    }

    public function __construct()
    {
        $location_data = $this->get_post_thumbnail_exif();

        if (!empty((string) $location_data['GPSCalculatedDecimal'])) {
            wp_enqueue_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDd2xvaomkryB3frWackKfzxkMAukkDJsI', null, null);
            wp_enqueue_script('sherborne_road_maps', get_template_directory_uri() . '/js/maps.js', array('jquery'), '1.0.0', true);

            $place = array(
                'city' => $location_data['iptc']['city'],
                'state' => $location_data['iptc']['state'],
                'country' => $location_data['iptc']['country'],
            );

            if ($place['city'] == $place['state']) {
                unset($place['state']);
            }

            $place_description = '<a href="/topic/' . strtolower($place['city']) . '/">' . implode(', ', $place) . '</a>';

            if (intval($location_data['GPSAltitudeCalculatedDecimal'])) {
                $altitude = sprintf(
                    __(', at %s metres above sea level', 'sherborne_road'),
                    $location_data['GPSAltitudeCalculatedDecimal']
                );
            } else {
                $altitude = '';
            }

            echo '<div class="meta meta-box mod map map-small">
                <h5 class="section-title">' . __('Geographic information', 'sherborne_road') . '</h5>
                <div class="content">
                    <a class="overlay flood-parent" href="//maps.google.com/?t=h&amp;q=' . $location_data['GPSCalculatedDecimal'] . '"></a>
                    <div id="postMapSmall" class="atom googlemap small map-small flood-parent" data-map="detail" data-lat="' . $location_data['GPSLatitudeDecimal'] . '" data-lon="' . $location_data['GPSLongitudeDecimal'] . '" data-overlaytext="' . __('View this location at the Google Maps website', 'permanenttourist') . '">
                        <p><a href="//maps.google.com/?t=h&amp;q=' . $location_data['GPSCalculatedDecimal'] . '">' . __('View this location at the Google Maps website', 'permanenttourist') . '</a></p>
                    </div>
                </div>
                <p>' . $place_description . $altitude . '.</p>
            </div>';
        }
    }

    //////////////////////////////////////////////////

    public function DMStoDEC($deg, $min, $sec)
    {
        // Converts DMS ( Degrees / minutes / seconds )
        // to decimal format longitude / latitude
        return $deg + ((($min * 60) + ($sec)) / 3600);
    } //DMStoDEC

    //////////////////////////////////////////////////

    public function DECtoDMS($dec)
    {
        // Converts decimal longitude / latitude to DMS
        // ( Degrees / minutes / seconds )

        // This is the piece of code which may appear to
        // be inefficient, but to avoid issues with floating
        // point math we extract the integer part and the float
        // part by using a string function.

        $vars = explode('.', $dec);
        $deg = $vars[0];
        $tempma = '0.' . $vars[1];

        $tempma = $tempma * 3600;
        $min = floor($tempma / 60);
        $sec = $tempma - ($min * 60);

        return array('deg' => $deg, 'min' => $min, 'sec' => $sec);
    } //DECtoDMS

    //////////////////////////////////////////////////

    private function extend_post_thumbnail_exif($exifdata)
    {

        /*
        [GPSLatitudeRef] => N
        [GPSLatitude] => Array
        (
        [0] => 57/1
        [1] => 31/1
        [2] => 21334/521
        )

        [GPSLongitudeRef] => W
        [GPSLongitude] => Array
        (
        [0] => 4/1
        [1] => 16/1
        [2] => 27387/1352
        )
         */

        $GPS = array();

        $GPS['lat']['deg'] = explode('/', $exifdata['GPSLatitude'][0]);
        $GPS['lat']['deg'] = $GPS['lat']['deg'][0] / $GPS['lat']['deg'][1];
        $GPS['lat']['min'] = explode('/', $exifdata['GPSLatitude'][1]);
        $GPS['lat']['min'] = $GPS['lat']['min'][0] / $GPS['lat']['min'][1];
        $GPS['lat']['sec'] = explode('/', $exifdata['GPSLatitude'][2]);
        if ($GPS['lat']['sec'][1] == '0' || $GPS['lat']['sec'][0] == '0') {
            $GPS['lat']['sec'] = 0;
        } else {
            $GPS['lat']['sec'] = floatval($GPS['lat']['sec'][0]) / floatval($GPS['lat']['sec'][1]);
        }

        $exifdata['GPSLatitudeDecimal'] = $this->DMStoDEC($GPS['lat']['deg'], $GPS['lat']['min'], $GPS['lat']['sec']);
        if ($exifdata['GPSLatitudeRef'] == 'S'):
            $exifdata['GPSLatitudeDecimal'] = 0 - $exifdata['GPSLatitudeDecimal'];
        endif;

        $GPS['lon']['deg'] = explode('/', $exifdata['GPSLongitude'][0]);
        $GPS['lon']['deg'] = $GPS['lon']['deg'][0] / $GPS['lon']['deg'][1];
        $GPS['lon']['min'] = explode('/', $exifdata['GPSLongitude'][1]);
        $GPS['lon']['min'] = $GPS['lon']['min'][0] / $GPS['lon']['min'][1];
        $GPS['lon']['sec'] = explode('/', $exifdata['GPSLongitude'][2]);
        if ($GPS['lon']['sec'][1] == '0' || $GPS['lon']['sec'][0] == '0') {
            $GPS['lon']['sec'] = 0;
        } else {
            $GPS['lon']['sec'] = floatval($GPS['lon']['sec'][0]) / floatval($GPS['lon']['sec'][1]);
        }

        $exifdata['GPSLongitudeDecimal'] = $this->DMStoDEC($GPS['lon']['deg'], $GPS['lon']['min'], $GPS['lon']['sec']);
        if ($exifdata['GPSLongitudeRef'] == 'W'):
            $exifdata['GPSLongitudeDecimal'] = 0 - $exifdata['GPSLongitudeDecimal'];
        endif;

        $exifdata['GPSCalculatedDecimal'] = $exifdata['GPSLatitudeDecimal'] . ',' . $exifdata['GPSLongitudeDecimal'];

        if (isset($exifdata['GPSAltitude'])) {
            $altitude_parts = explode('/', $exifdata['GPSAltitude']);
            $exifdata['GPSAltitudeCalculatedDecimal'] = (int) ($altitude_parts[0] / $altitude_parts[1]);
        } else {
            $exifdata['GPSAltitudeCalculatedDecimal'] = null;
        }

        $size = getimagesize($this->post_thumbnail, $info);
        if (isset($info['APP13'])) {
            $iptc = iptcparse($info['APP13']);

            if (is_array($iptc)) {
                $exifdata['iptc']['caption'] = isset($iptc['2#120']) ? $iptc['2#120'][0] : '';
                $exifdata['iptc']['graphic_name'] = isset($iptc['2#005']) ? $iptc['2#005'][0] : '';
                $exifdata['iptc']['urgency'] = isset($iptc['2#010']) ? $iptc['2#010'][0] : '';
                $exifdata['iptc']['category'] = @$iptc['2#015'][0];

                // note that sometimes supp_categories contans multiple entries
                $exifdata['iptc']['supp_categories'] = @$iptc['2#020'][0];
                $exifdata['iptc']['spec_instr'] = @$iptc['2#040'][0];
                $exifdata['iptc']['creation_date'] = @$iptc['2#055'][0];
                $exifdata['iptc']['photog'] = @$iptc['2#080'][0];
                $exifdata['iptc']['credit_byline_title'] = @$iptc['2#085'][0];
                $exifdata['iptc']['city'] = @$iptc['2#090'][0];
                $exifdata['iptc']['state'] = @$iptc['2#095'][0];
                $exifdata['iptc']['country'] = @$iptc['2#101'][0];
                $exifdata['iptc']['otr'] = @$iptc['2#103'][0];
                $exifdata['iptc']['headline'] = @$iptc['2#105'][0];
                $exifdata['iptc']['source'] = @$iptc['2#110'][0];
                $exifdata['iptc']['photo_source'] = @$iptc['2#115'][0];
                $exifdata['iptc']['caption'] = @$iptc['2#120'][0];

                $exifdata['iptc']['keywords'] = @$iptc['2#025'];
            }
        }

        return $exifdata;
    }

    public function get_post_thumbnail_exif()
    {
        $postID = get_the_ID();
        if ($postID) {
            $thumbnailID = get_post_thumbnail_id($post->ID);
            if ($thumbnailID) {
                $metaData = wp_get_attachment_metadata($thumbnailID);
                $paths = wp_upload_dir();
                $pre = $paths['basedir'];

                $this->post_thumbnail = $pre . '/' . $metaData['file'];

                $exif = @exif_read_data($this->post_thumbnail, 0, true);

                if ($exif && isset($exif['GPS']['GPSLongitude']) && isset($exif['GPS']['GPSLongitude'])) {
                    return $this->extend_post_thumbnail_exif($exif['GPS']);
                }
            }
        }

        return;
    }
}

new MapSmall();
