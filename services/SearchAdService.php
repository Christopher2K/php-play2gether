<?php

require_once(__DIR__ . '/../dao/AdDAO.php');
require_once(__DIR__ . '/../dao/SportDAO.php');
require_once(__DIR__ . '/../dao/UserDAO.php');


function getSearchResult($db, $post_data) {
    $ad_dao = new AdDAO($db);
    $sport_dao = new SportDAO($db);
    $user_dao = new UserDAO($db);

    if ($post_data['date'] == '') {
        unset($post_data['date']);
    }

    if ($post_data['sport_fk'] == '') {
        unset($post_data['sport_fk']);
    }

    $ads = [];

    $post_data['status_fk'] = '2';

    $ads_founded = array_slice($ad_dao->select($post_data), 0, 20);

    if ($ads_founded) {
        if (count($ads_founded) == 0) {
            $response[ 'status' ] = 'not_found';
        } else {
            foreach ($ads_founded as $ad) {
                $data = $ad->toFrontend(
                    count($user_dao->getUsersByAd($ad->getIdAd())),
                    $sport_dao->select(['id_sport' => $ad->getSportFk()])[ 0 ]
                );

                array_push($ads, $data);
            }

            return $ads;
        }
    }

    return [];
}