var Service_Usuario = (function(){
	
	var carregaInfoUsuarioDBAjax = function(){
		
		var usuario = '';
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Usuario.php",
			cache: false,
			dataType:"json",
			beforeSend: function() {
				$(".carregaUsuario").html("Carregando usuários...");
			},
			success: function(retorno) {
			
			setTimeout(function(){
				
				retorno.map(function(dados){
					
					var status = '',
						acesso = '';
					(dados.cpStatus == "A") ? status = "Ativo" : status = "Bloqueado";
					if(dados.cpNivelAcesso == "C"){
						acesso = "Comum";
					}else if(dados.cpNivelAcesso == "S") {
						acesso = "Super";
					}else if(dados.cpNivelAcesso == "A") {
						acesso = "Adiministrador";
					} 
				
					usuario += "<tr>";
					usuario += "<td>"+dados.idUsuario+"</td>";
					usuario += "<td>"+dados.cpNome+"</td>";
					usuario += "<td>"+status+"</td>";
					usuario += "<td>"+acesso+"</td>";
					usuario += "<td><a href='Usuario.php?panel=767438&acao=editar&id="+dados.idUsuario+"'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";
					usuario += "<td><a href='../controller/Usuario_Controller.php?acao=deletar&id="+dados.idUsuario+"'><span class='glyphicon glyphicon-trash' id='excluirUsuario' aria-hidden='true'></span></a></td>";
					usuario += "</tr>";
					
				});
				
				$("#tableUsuarios tbody").html(usuario);
				$(".carregaUsuario").html("");
				
				if(usuario == "") {
					
					$(".msgUsuarioVazio").html("Nenhum usuário cadastrado no momento !");
				}
				
			},1200);	
				
			}
			
		});
		
	}
	
	return {
		
		carregaInfoUsuarioDBAjax: carregaInfoUsuarioDBAjax
	}
	
})();