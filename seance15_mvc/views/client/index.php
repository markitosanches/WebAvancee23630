{{ include('layouts/header.php', {title:'Clients'})}}
    <h1>Client</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        {% for client in clients %}
            <tr>
                <td><a href="{{base}}/client/show?id={{client.id}}">{{client.name}}</a></td>
                <td>{{client.address}}</td>
                <td>{{client.phone}}</td>
                <td>{{client.email}}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
    <a href="{{base}}/client/create" class="btn">New Client</a>
{{ include('layouts/footer.php')}}
