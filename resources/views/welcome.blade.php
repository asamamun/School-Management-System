@extends('layouts.main', ['title' => 'Home'])
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12 text-white rounded p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/image/books.jpg') }}'); background-size: cover; background-position: center;">
            <h1 class="text-center">School Management System</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate, enim in pharetra tempus, turpis velit aliquet elit, ac rhoncus nibh nunc in velit. Nulla facilisi. Sed sed ex urna. Suspendisse potenti. Sed euismod, nibh nec feugiat tincidunt, dolor nisl semper nibh, id ullamcorper ligula odio ac ligula. Sed ut nibh eget nunc lobortis pretium. Sed euismod, nibh nec feugiat tincidunt, dolor nisl semper nibh, id ullamcorper ligula odio ac ligula.lorem</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum ipsa, officiis tempora eum dignissimos nesciunt fuga, magni eveniet harum adipisci pariatur accusamus molestiae voluptas non rem iusto laudantium necessitatibus neque.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum ipsa, officiis tempora eum dignissimos nesciunt fuga, magni eveniet harum adipisci pariatur accusamus molestiae voluptas non rem iusto laudantium necessitatibus neque.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum ipsa, officiis tempora eum dignissimos nesciunt fuga, magni eveniet harum adipisci pariatur accusamus molestiae voluptas non rem iusto laudantium necessitatibus neque.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum ipsa, officiis tempora eum dignissimos nesciunt fuga, magni eveniet harum adipisci pariatur accusamus molestiae voluptas non rem iusto laudantium necessitatibus neque.</p>
        </div>
        {{-- <div class="col-md-5">
            <img src="{{ asset('assets/image/books.jpg') }}" class="img-fluid" alt="Responsive image">
        </div> --}}
    </div>
</div>
    
@endsection
