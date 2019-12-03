@if($errors->any())
    <div class="errors">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif