<form class="input-group mb-2" action="">
    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search Here ..."
        aria-label="Recipient's username" aria-describedby="button-addon2">

    @if (request('category'))
       <input type="hidden" name="category" value="{{ request('category') }}">
    @endif

    @if (request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}">
    @endif

    <button class="btn btn-outline-primary" type="submit" id="button-addon2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" width="24" height="24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </button>
</form>
