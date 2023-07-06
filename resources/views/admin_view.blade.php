

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin form</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
      integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
      crossorigin="anonymous"
    />
    <style>
      .bg-light {
        background-color: #a4d0fd !important;
      }
    </style>

    <script
      src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <br> <br>
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <h3 class="text-center text-primary">{{$title}}</h3>
          <form action="{{$url}}" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                autocomplete="off"
                value="{{$admin->name}}"
              />
              <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                rows="3"
                autocomplete="off"
                value="{{$admin->email}}"
              />
              <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                autocomplete="off"
                value="{{$admin->password}}"
              />
              <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
            </span>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
          </form>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </body>
</html>