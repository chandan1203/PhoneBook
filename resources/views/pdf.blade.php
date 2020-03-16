
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col" width="40%">Name</th>
                              <th scope="col" width="30%">Phone Number</th>
                              <th scope="col" width="30%">Email</th>
                            </tr>
                          </thead>
                          <tbody>
              							<tr>
              								<td>{{ $contact->name}}</td>
              								<td>{{ $contact->phone}}</td>
              								<td>{{ $contact->email}}</td>
              							</tr>
                          </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

