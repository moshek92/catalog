<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Sport Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $customer_name = "80's Store";
    $catalog_num = 1000;
    $updates = True;

    $time = time();
    $last_update = date('d/m/Y', $time);
    $store_rating = rand(1, 5);

    // trending products: name, price, description, image
    $trending_prods = [
        [
            'name' => 'Product 1',
            'price' => 54,
            'description' => 'Very nice product',
            'image' => 'https://cdn.pixabay.com/photo/2016/12/10/16/57/shoes-1897708__340.jpg'
        ],
        [
            'name' => 'Product 2',
            'price' => 33,
            'description' => 'Ok',
            'image' => 'product2.jpg'
        ],
        [
            'name' => 'Product 3',
            'price' => 108,
            'description' => 'Expansive',
            'image' => 'product3.jpg'
        ],
    ];

    // offers
    $offers = [
        [
            'title' => 'available now!',
            'text' => 'buy now before the offer expire'
        ],
        [
            'title' => '2 in the price of 1',
            'text' => 'excellent'
        ]
    ];

    function store_rating_txt($rating)
    {
        switch ($rating) {
            case 1:
            case 2:
                return "poor rating";
                break;
            case 3:
            case 4:
                return "room for improvment";
                break;
            case 5:
                return "awesome";
                break;
            default:
                return "out of range";
                break;
        }
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">The Sport Catalog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <ul>
        <li><?php echo $catalog_num ?></li>
        <li><?php echo $updates ?></li>
        <li><?php echo $last_update ?></li>
    </ul>

    <main class="px-4">

        <h5>
            <span class="badge bg-info text-dark">
                <?php
                echo "$store_rating ";
                echo ($store_rating === 1) ? 'Star' : 'Stars';
                ?>
            </span>
            <!-- ver 1. if condition -->
            <?php
            // if ($store_rating <= 2) {
            //     echo 'poor rating';
            // } elseif ($store_rating === 5) {
            //     echo 'awesome';
            // } else {
            //     echo 'room for improvment';
            // }
            ?>

            <?= store_rating_txt($store_rating); ?>
        </h5>

        <p>
            <?php echo $customer_name; ?>
        </p>

        <h4>Trending Products</h4>

        <div class="row">
            <?php
            foreach ($trending_prods as $prod) {
                $col = <<<COL
                        <div class="col">
                        <div class="card">
                            <img src="{$prod['image']}" class="card-img-top" alt="{$prod['name']}">
                            <div class="card-body">
                                <h5 class="card-title">{$prod['name']}</h5>
                                <h6 class="card-text">\${$prod['price']}</h6>
                                <p class="card-text">{$prod['description']}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    COL;

                echo $col;
            }
            ?>
        </div>

        <hr>

        <h4>Our Special Offers</h4>

        <div class="row">
            <?php
            foreach ($offers as $offer) {
                $col = <<<COL
                        <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{$offer['title']}</h5>
                                <p class="card-text">{$offer['text']}</p>
                                <a href="#" class="btn btn-primary">Get It</a>
                            </div>
                        </div>
                    </div>
                    COL;

                echo $col;
            }
            ?>
        </div>



    </main>
</body>

</html>