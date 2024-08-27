<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Tarefa</title>
    <script>
        function confirmUpdate(event) {
            if (!confirm('Tem certeza de que deseja atualizar esta tarefa?')) {
                event.preventDefault(); // Impede o envio do formulário se o usuário cancelar
            }
        }
    </script>
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
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007bff; /* Cor do botão */
            color: #ffffff; /* Cor do texto */
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3; /* Cor do botão ao passar o mouse */
        }

        button:focus {
            outline: none;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Tarefa</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST" onsubmit="return confirmUpdate(event)">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome da Tarefa</label>
                <input type="text" name="name" id="name" value="{{ old('name', $tarefa->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" value="{{ old('description', $tarefa->description) }}" required>
            </div>

            <div class="form-group">
                <label for="date">Prazo</label>
                <input type="date" name="date" id="date" value="{{ old('date', $tarefa->date) }}" required>
            </div>

            <button type="submit">Atualizar Tarefa</button>
        </form>
    </div>
</body>
</html>
