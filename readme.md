Example shortcode for serverside rendering and interactivity using [HTMXpress](https://github.com/svandragt/htmxpress). Based on [Htmx serverside block example](https://github.com/svandragt/htmxpress-serverside-block/).

Requires [HTMXPress plugin](https://github.com/svandragt/htmxpress) being installed and active.
After installing this plugin, include the shortcode in template using `[htmx_shortcode]`.

## Description

The `htmx_shortcode_function` function simply includes a template:

```php
'render_callback' => function () {
        ob_start();
        load_template( __DIR__ . '/templates/random_posts.php' );
        return ob_get_clean();
},
```
The plugin's templates are registered with HTMXpress, this makes them available under the `/htmx/` endpoint:

```php
# register plugin's templates, which adds them to the /htmx endpoint.
add_filter( 'htmx.template_paths', static function ( $paths ) {
    $paths[] = __DIR__ . '/templates';
    return $paths;
} );
```

The templates/random_posts.php template contains a WP_Query to load 3 random posts and a button which refreshes only the posts:
```php
echo '<button hx-post="/htmx/random_posts" hx-target="#random-posts"> More </button>';
```
## Demo:

https://github.com/svandragt/htmxpress-serverside-block/assets/594871/99bdb328-2102-469c-944f-d53baff46594

