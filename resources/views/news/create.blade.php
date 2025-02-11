<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Tiêu đề:</label>
    <input type="text" name="title" required>

    <label for="content">Nội dung:</label>
    <textarea name="content" required></textarea>

    <label for="image">Ảnh bài viết:</label>
    <input type="file" name="image" accept="image/*">

    <button type="submit">Đăng bài</button>
</form>