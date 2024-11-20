<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .route-header {
            background-color: #f8f9fa;
            padding: 15px;
            font-size: 1.25rem;
        }

        .route-info {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #f1f3f5;
        }

        .route-info .title {
            font-weight: bold;
        }

        .route-info .validation,
        .route-info .response {
            margin-top: 10px;
        }

        .route-info pre {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1>API Documentation</h1>

        <!-- Categories Route -->
        <div class="route-info">
            <div class="route-header">GET /categories</div>
            <div class="title">Parameters:</div>
            <p>No parameters required.</p>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>{
    "status": true,
    "categories": [
        {
            "id": 1,
            "name": "Category 1",
            "subcategories": [
                {
                    "id": 1,
                    "name": "Subcategory 1"
                },
                {
                    "id": 2,
                    "name": "Subcategory 2"
                }
            ]
        },
        {
            "id": 2,
            "name": "Category 2",
            "subcategories": []
        }
    ]
}</pre>
            </div>
        </div>

        <!-- Products Route -->
        <div class="route-info">
            <div class="route-header">POST /products</div>
            <div class="title">Parameters:</div>
            <pre>{
    "category_id": "required|exists:categories,id",
    "subcategory_id": "required|exists:sub_categories,id"
}</pre>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>{
    "status": true,
    "products": [
        {
            "id": 1,
            "name": "Product 1",
            "price": 100,
            "units": 20
        },
        {
            "id": 2,
            "name": "Product 2",
            "price": 150,
            "units": 10
        }
    ]
}</pre>
            </div>
        </div>

        <!-- Orders Route -->
        <div class="route-info">
            <div class="route-header">GET /orders</div>
            <div class="title">Parameters:</div>
            <p>No parameters required. Requires authentication.</p>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>{
    "status": true,
    "orders": [
        {
            "id": 1,
            "total_price": 300,
            "comments": "First order",
            "items_count": 2
        },
        {
            "id": 2,
            "total_price": 500,
            "comments": "Second order",
            "items_count": 3
        }
    ]
}</pre>
            </div>
        </div>

        <!-- Store Order Route -->
        <div class="route-info">
            <div class="route-header">POST /order/create</div>
            <div class="title">Parameters:</div>
            <pre>{
    "total_price": "required|numeric",
    "comments": "required|string",
    "signature": "required|image|max:10240|mimes:jpeg,png,jpg,gif",
    "products": "required|array",
    "products.*.product_id": "required|exists:products,id",
    "products.*.quantity": "required|integer|min:1",
    "products.*.price": "required|numeric"
}</pre>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>{
    "status": true,
    "message": "Order created successfully.",
    "order_id": 1
}</pre>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .route-header {
            background-color: #f8f9fa;
            padding: 15px;
            font-size: 1.25rem;
        }

        .route-info {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #f1f3f5;
        }

        .route-info .title {
            font-weight: bold;
        }

        .route-info .validation,
        .route-info .response {
            margin-top: 10px;
        }

        .route-info pre {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1>API Documentation</h1>

        <!-- Categories Route -->
        <div class="route-info">
            <div class="route-header">GET /categories</div>
            <div class="title">Parameters:</div>
            <p>No parameters required.</p>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>{
    "status": true,
    "categories": [
        {
            "id": 1,
            "name": "Category 1",
            "subcategories": [
                {
                    "id": 1,
                    "name": "Subcategory 1"
                },
                {
                    "id": 2,
                    "name": "Subcategory 2"
                }
            ]
        },
        {
            "id": 2,
            "name": "Category 2",
            "subcategories": []
        }
    ]
}</pre>
            </div>
        </div>

        <!-- Products Route -->
        <div class="route-info">
            <div class="route-header">POST /products</div>
            <div class="title">Parameters:</div>
            <pre>{
    "category_id": "required|exists:categories,id",
    "subcategory_id": "required|exists:sub_categories,id"
}</pre>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>{
    "status": true,
    "products": [
        {
            "id": 1,
            "name": "Product 1",
            "price": 100,
            "units": 20
        },
        {
            "id": 2,
            "name": "Product 2",
            "price": 150,
            "units": 10
        }
    ]
}</pre>
            </div>
        </div>

        <!-- Orders Route -->
        <div class="route-info">
            <div class="route-header">GET /orders</div>
            <div class="title">Parameters:</div>
            <p>No parameters required. Requires authentication.</p>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>{
    "status": true,
    "orders": [
        {
            "id": 1,
            "total_price": 300,
            "comments": "First order",
            "items_count": 2
        },
        {
            "id": 2,
            "total_price": 500,
            "comments": "Second order",
            "items_count": 3
        }
    ]
}</pre>
            </div>
        </div>

        <!-- Store Order Route -->
        <div class="route-info">
            <div class="route-header">POST /order/create</div>
            <div class="title">Parameters:</div>
            <pre>{
    "total_price": "required|numeric",
    "comments": "required|string",
    "signature": "required|image|max:10240|mimes:jpeg,png,jpg,gif",
    "products": "required|array",
    "products.*.product_id": "required|exists:products,id",
    "products.*.quantity": "required|integer|min:1",
    "products.*.price": "required|numeric"
}</pre>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>{
    "status": true,
    "message": "Order created successfully.",
    "order_id": 1
}</pre>
            </div>
        </div>

        <div class="route-info">
            <div class="route-header">POST /order/details</div>
            <div class="title">Parameters:</div>
            <pre>{
        "order_id": "required|exists:orders,id"
    }</pre>

            <div class="validation">
                <div class="title">Response:</div>
                <pre>
                    {
                        "status": true,
                        "order": {
                            "id": 1,
                            "user_id": 2,
                            "total_price": "129.08",
                            "status": "shipped",
                            "comments": "Dolores sequi ipsam.",
                            "items": [
                                {
                                    "id": 1,
                                    "order_id": 1,
                                    "product_id": 2,
                                    "quantity": 2,
                                    "price": "10.99",
                                    "product": {
                                        "id": 2,
                                        "name": "Math Book",
                                        "slug": "math-book",
                                        "price": "40.00",
                                        "description": "a math text book",
                                        "image": "http://127.0.0.1:8000/upload/7/pngtree-geometric-calculation-math-problem-image_1475728.jpg",
                                    }
                                }
                            ]
                        }
                    }
                </pre>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
