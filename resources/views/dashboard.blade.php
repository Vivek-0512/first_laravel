<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: url('image/first.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 5rem 0;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard">Home</a>
                    </li>
                    @if(!$data->active)
                    <li class="nav-item">
                        <a class="nav-link" href="user">User</a>
                    </li>
                    @endif
                    <li class="nav-item float-end">
                        <a class="nav-link" href="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h1>Welcome to My Website</h1>
            <p class="lead">Your journey to excellence starts here.</p>
            <a href="#" class="btn btn-primary btn-lg">{{ $data->name }}</a>
        </div>
    </section>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Feature 1">
                    <div class="card-body">
                        <h5 class="card-title">Feature 1</h5>
                        <p class="card-text">Description of feature 1. Learn more about how it can benefit you.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Feature 2">
                    <div class="card-body">
                        <h5 class="card-title">Feature 2</h5>
                        <p class="card-text">Description of feature 2. Discover more about its features.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Feature 3">
                    <div class="card-body">
                        <h5 class="card-title">Feature 3</h5>
                        <p class="card-text">Description of feature 3. Find out how it can help you.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>