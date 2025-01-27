<h1>إضافة دور أو صلاحية جديدة</h1>

@if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('roles_permissions.store') }}" method="POST">
    @csrf
    <label for="name">الاسم:</label>
    <input type="text" name="name" id="name" required>

    <label for="type">النوع:</label>
    <select name="type" id="type">
        <option value="role">دور</option>
        <option value="permission">صلاحية</option>
    </select>

    <button type="submit">إضافة</button>
</form>
