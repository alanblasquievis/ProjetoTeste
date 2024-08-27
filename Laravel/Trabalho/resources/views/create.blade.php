<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Tarefa</title>
    <style>
        body {
            background-color: #626470; /* Fundo cinza */
            font-family: Arial, sans-serif;
            color: #000000; /* Cor do texto em preto */
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            padding: 20px 0;
        }

        .container {
            background-color: #8a7c7c; /* Um tom mais claro de cinza para o bloco */
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #ffffff;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #dddddd;
        }

        button {
            background-color: #007bff; /* Cor do botão */
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3; /* Cor do botão ao passar o mouse */
        }

        .error-list {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .error-list ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .error-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Criar Nova Tarefa</h1>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tarefas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome da Tarefa</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" value="{{ old('description') }}" required>
            </div>

            <div class="form-group">
                <label for="date">Prazo</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}" required>
            </div>

            <button type="submit">Criar Tarefa</button>
        </form>
    </div>
</body>
</html>
