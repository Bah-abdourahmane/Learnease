<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LearEase</title>

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <!-- poppins  playfair  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    'poppins': ['Poppins', 'sans-serif'],
                },
                extend: {
                    colors: {
                        primary: "#967dff",
                        secondary: "#fea115",
                        blackColor: "#1b1b1b",
                    },
                },
            },
        }
    </script>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        @layer utilities {
            body {
                scroll-behavior: smooth !important;
                font-family: "Poppins", sans-serif !important;
            }

            .title {
                font-family: "Playfair Display", serif !important;
            }

            .shadow__1 {
                -webkit-box-shadow: 0 0 12px 1px rgba(0, 0, 0, 0.3);
                -moz-box-shadow: 0 0 12px 1px rgba(0, 0, 0, 0.3);
                box-shadow: 0 0 12px 1px rgba(0, 0, 0, 0.3);
            }

            .shadow__2 {
                -webkit-box-shadow: 10px 10.5px 10px -0.5px rgba(0, 0, 0, 0.30);
                -moz-box-shadow: 10px 10.5px 10px -0.5px rgba(0, 0, 0, 0.30);
                box-shadow: 10px 10.5px 10px -0.5px rgba(0, 0, 0, 0.30);
            }

            input {
                outline: none;
                background: transparent;
                border: none;
            }
        }
    </style>
</head>

<body class="w-full h-full bg-[#fefefe]">
    <h1>Visionnage du cours</h1>
</body>

</html>
