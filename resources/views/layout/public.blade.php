<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        @media (min-width: 768px) {
            .h-md-250 {
                height: 250px;
            }
        }
    </style>
</head>
<body>
@include('includes.public.navbar')

@yield('body')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const getStoredTheme = () => localStorage.getItem('theme')
    const setStoredTheme = theme => localStorage.setItem('theme', theme)

    const getPreferredTheme = () => {
        const storedTheme = getStoredTheme()
        if (storedTheme) {
            return storedTheme
        }

        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    }

    const setTheme = theme => {
        if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.setAttribute('data-bs-theme', 'dark')
        } else {
            document.documentElement.setAttribute('data-bs-theme', theme)

            if (theme === 'light') {
                document.querySelectorAll('.active-on-light').forEach(element => element.style.display = 'block');
                document.querySelectorAll('.active-on-dark').forEach(element => element.style.display = 'none');
            } else {
                document.querySelectorAll('.active-on-dark').forEach(element => element.style.display = 'block');
                document.querySelectorAll('.active-on-light').forEach(element => element.style.display = 'none');
            }

            setStoredTheme(theme)
        }
    }

    setTheme(getPreferredTheme())
</script>
</body>
</html>
