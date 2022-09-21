<?php
remove_action('wp_head', 'wp_generator'); // Убирает вывод используемого движка и его версии
remove_action('wp_head', 'rel_canonical'); // Убирает канонические линки
remove_action('wp_head', 'wp_shortlink_wp_head'); // Убирает короткую ссылку к текущей странице
remove_action('wp_head', 'wlwmanifest_link'); // Используется блог-клиентами, а вернее лишь одним из них - Windows Live Writer. Не используете WLW - удаляйте.
remove_action('wp_head', 'rsd_link'); // Используется различными блог-клиентами или веб-сервисами для публикации/изменения записей в блоге.
remove_action('wp_head', 'pagenavi_css'); // Убирает вывод лишнего css изи плагина WP-PageNavi
remove_action('wp_head', 'index_rel_link'); // Убирает ссылку на главную страницу
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Убирает ссылку на предыдущую запись
remove_action('wp_head', 'start_post_rel_link', 10, 0);  // Убирает ссылку на первую запись
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Убирает связь с родительской записью
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Убирает ссылку на следующую запись
remove_action('wp_head', 'feed_links_extra', 3); // Запрещаем вывод RSS фида для записей, тегов, рубрик и т.д. Таким образом, мы запрещаем создавать такие фиды, но тем не менее, они будут доступны, если добавить /feed в конец урла.
remove_action('wp_head', 'feed_links', 2); // Формально если запретить данное действие, то в блоге не должны выводиться ссылки на основную ленту RSS и на RSS ленту комментариев. А на практике это работать не будет, так как функция wp_head не выводит эти самые ссылки на RSS ленты записей и комментариев, их вывод должен осуществляться вручную в файле header.php
//полное отключение Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

add_action( 'wp_enqueue_scripts', 'site_scripts');
function site_scripts() {
	$version= '0.0.0.0';
	wp_dequeue_style( 'wp-block-library' );

	wp_enqueue_style('main-style', get_stylesheet_uri(), [], $version);
  	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Andika&display=swap');

	wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');
	wp_register_script( 'jquery-core', 'https://code.jquery.com/jquery-3.5.1.min.js', [], null );
	wp_register_script( 'jquery', false, array('jquery-core'), null );
	wp_enqueue_script( 'jquery' );

    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', [], $version, true);
};

function alter_wpcf7_posted_data( $data ) {
    if($_POST['email-108'] != "") {
        $_POST['tel-326'] = "+7 (000) 000-00-00";
        $data['tel-326'] = "";
    }
    if($_POST['tel-326'] != "+7 (___) ___-__-__") {
        $_POST['email-108'] = "test@mail.ru";
    }
    return $data;
}
add_filter("wpcf7_posted_data", "alter_wpcf7_posted_data");