<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP All-Stars</title>
    <script></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="text-center">
        <h2 class=" mb-1">Top Starred PHP Repositories</h2>
        <a href="{{ route('update') }}">Update Database</a>
    </div>

    <table
        class="mt-2 table-bordered th, table-bordered td { border: 1px solid black } mx-auto table-sm w-25 text-left">
        @foreach ($repositories as $repository)
            <div class="accordion" id="accordion">
                <tr class="accordion-item">
                    <th scope="col" class="accordion-header align-middle" id="headingOne">
                        <div class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="{{ '#' . $repository->name }}" aria-expanded="true"
                            aria-controls="collapseOne">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" style="width: 1rem" class="mb-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            {{ Str::ucfirst($repository->name) }}
                        </div>


                    </th>
                    <td class="d-flex
                                justify-content-center"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="gold" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" style="width: 1rem">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                        {{ $repository->number_of_stars }}</td>
                </tr>
                <tr>
                    <td>
                        <div id="{{ $repository->name }}" class="accordion-collapse collapse"
                            aria-labelledby="headingOne" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>{{ $repository->description }}</p>
                                <p>Repository ID: {{ $repository->repository_ID }}</p>
                                <p><a href="{{ $repository->url }}">Repository</a></p>
                                <p>Created: {{ date('d-m-Y', strtotime($repository->created_date)) }}</p>
                                <p>Last Push: {{ \Carbon\Carbon::parse($repository->last_push_date)->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
            </div>
        @endforeach
    </table>
    <div class="mt-3 w-25 mx-auto">
        {!! $repositories->links('pagination::bootstrap-5') !!}
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>

</html>
