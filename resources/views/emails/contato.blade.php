<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Contato Recebido - Cerrado Consórcios</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; color: #333;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0" border="0"
                    style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <tr>
                        <td align="center"
                            style="background-color: #007BFF; color: #ffffff; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                            <h1 style="margin: 0; padding: 20px;">Novo Contato Recebido</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Nome:</strong> {{ $data['nome'] }}</p>
                            <p><strong>Telefone:</strong> {{ $data['telefone'] }}</p>
                            <p><strong>E-mail:</strong> {{ $data['email'] }}</p>
                            <p><strong>Cidade:</strong> {{ $data['cidade'] }}</p>
                            <p><strong>Estado:</strong> {{ $data['estado'] }}</p>
                            <p><strong>Tipo de Consórcio:</strong> {{ $data['Tipo de Consórcio'] }}</p>
                            <p><strong>Valor do Crédito</strong> {{ $data['Valor do Crédito'] }}</p>

                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 12px; color: #999;">
                            <p>Este e-mail foi gerado automaticamente. Por favor, não responda.</p>
                            <p>Enviado a partir do site <a
                                    href="https://cerradoconsorcios.com.br/">cerradoconsorcios.com.br</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
