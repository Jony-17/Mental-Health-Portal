// Função para mostrar a notificação
function showNotification() {
    var notification = document.getElementById('notification');
    notification.style.display = 'block';
  }
  
  // Função para fechar a notificação
  function dismissNotification() {
    var notification = document.getElementById('notification');
    notification.style.display = 'none';
  }
  
  // Verifica se a notificação já foi mostrada hoje
  function checkNotification() {
    // Recupera a data da última notificação do armazenamento local (localStorage)
    var lastNotificationDate = localStorage.getItem('lastNotificationDate');
  
    if (lastNotificationDate) {
      // Converte a data da última notificação de string para objeto Date
      lastNotificationDate = new Date(lastNotificationDate);
  
      // Obtém a data e hora atuais
      var now = new Date();
  
      // Calcula a diferença em milissegundos entre a data atual e a data da última notificação
      var timeDiff = now.getTime() - lastNotificationDate.getTime();
  
      // Calcula a diferença em horas
      var hoursDiff = timeDiff / (1000 * 60 * 60);
  
      // Se já se passaram mais de 24 horas desde a última notificação, mostra a notificação novamente
      if (hoursDiff >= 24) {
        showNotification();
        // Atualiza a data da última notificação para a data atual
        localStorage.setItem('lastNotificationDate', now);
      }
    } else {
      // Se não houver data de última notificação, mostra a notificação
      showNotification();
      // Salva a data atual como data da última notificação
      localStorage.setItem('lastNotificationDate', new Date());
    }
  }
  
  // Executa a verificação da notificação ao carregar a página
  checkNotification();
  