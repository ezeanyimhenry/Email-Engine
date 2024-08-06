<!-- resources/views/templates/create.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Email Template</title>
    <script src="https://cdn.tiny.cloud/1/btezf2zqkbycoo2id6hkuew6tdswfaj0z7gmz7b0p9c5g7xs/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            menubar: false,
            plugins: 'link image code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        });
    </script>
</head>

<body>
    <h1>Create Email Template</h1>
    <form action="{{ route('templates.store') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        
        <label for="content">Content</label>
        <textarea id="content" name="content" required></textarea>

        <button type="submit">Save Template</button>
    </form>
</body>

</html>
