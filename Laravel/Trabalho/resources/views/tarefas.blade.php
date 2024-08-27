<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Tarefas</title>
    <script>
        function confirmDelete(event) {
            if (!confirm('Tem certeza de que deseja excluir esta tarefa?')) {
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
            max-width: 900px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #000000;
            text-align: left;
        }

        th {
            background-color: #8a7c7c; /* Fundo cinza escuro para os cabeçalhos */
            color: #ffffff; /* Cor do texto em branco */
        }

        td {
            text-align: left; /* Alinhamento padrão das células */
        }

        th.actions, td.actions {
            text-align: center; /* Centraliza o conteúdo nas células da coluna de ações */
        }

        a {
            display: block;
            margin-bottom: 20px;
            color: #ffffff;
            background-color: #007bff; /* Cor do link */
            padding: 10px;
            text-decoration: none;
            text-align: center;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0056b3; /* Cor do link ao passar o mouse */
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        /* Estilo para o botão de exclusão */
        .btn-delete {
            background-color: #dc3545; /* Cor de fundo vermelha */
            color: #ffffff; /* Cor do texto branco */
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
            display: inline-block; /* Exibe o botão como um bloco em linha */
        }

        .btn-delete:hover {
            background-color: #c82333; /* Cor de fundo vermelha escura ao passar o mouse */
        }

        .btn-delete:focus {
            outline: none;
        }

        .btn-delete:disabled {
            background-color: #6c757d; /* Cor de fundo cinza para botão desabilitado */
            cursor: not-allowed;
        }

        /* Estilo para o botão de editar */
        .btn-edit {
            background-color: #28a745; /* Cor de fundo verde */
            color: #ffffff; /* Cor do texto branco */
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
            display: inline-block; /* Exibe o botão como um bloco em linha */
            margin-left: 5px; /* Espaçamento entre botões */
        }

        .btn-edit:hover {
            background-color: #218838; /* Cor de fundo verde escuro ao passar o mouse */
        }

        .btn-edit:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Tarefas</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <a href="{{ route('tarefas.create') }}">Criar Nova Tarefa</a>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th class="actions">Ações</th> <!-- Centraliza o título da coluna de ações -->
                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->name }}</td>
                    <td>{{ $tarefa->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($tarefa->date)->format('d/m/Y') }}</td>
                    <td class="actions"> <!-- Centraliza as ações -->
                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirmDelete(event)" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Excluir</button>
                        </form>
                        <form action="{{ route('tarefas.edit', $tarefa->id) }}" method="get" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn-edit">Editar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
