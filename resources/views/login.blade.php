<x-layouts.main title="Login" description="Login here">
    <section class="flex flex-col gap-10 max-w-3xl mx-auto py-10">
        <h1 class="text-2xl font-bold">Login Here</h1>
        <form action="/login" method='post' class="flex flex-col gap-5">
            @csrf
            <div class="flex flex-col gap-2">
                <label>Email</label>
                <input name='login-email' class="p-2 border border-neutral-200 rounded-xl" type="emaiil" placeholder="Enter your email"  value="{{old('login-email')}}"/>
            </div>
            <div class="flex flex-col gap-2">
                <label>Password</label>
                <input name="login-password" class="p-2 border border-neutral-200 rounded-xl" type="password" placeholder="Enter your password" value="{{old('login-password')}}" />
            </div>
            <button class="px-4 py-2 bg-orange-600 text-white font-medium w-fit rounded-2xl">Login</button>
            <p class="text-sm text-neutral-600">Don't have an account? <span><a class="text-orange-600 underline" href="{{route('register')}}">Create New Account</a></span></p>
        </form>
    </section>
</x-layouts.main>