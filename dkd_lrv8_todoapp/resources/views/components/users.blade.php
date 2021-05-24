<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <table class="table table-hover">
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Password</td>
                </tr>
                @foreach ($res as $user)
                <tr>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    
                    <td>{{ $user->password}}</td>
                </tr>
                @endforeach
            </table>
</div>