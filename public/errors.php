<?php

/**
 * A constante E_ALL indica que todos os tipos de erros e avisos serão reportados.
 */
ini_set('error_reporting', E_ALL);

/**
 * true: ativa o log de erros. Permite o uso de 'error_log'. Veja mais abaixo.
 * false: desativa
 */
ini_set('log_errors', false);

/**
 * Define o local onde os logs serão registrados.
 * Recomenda-se o uso de path absoluto.
 * Exemplo, evite referenciar o caminho para paths relativos como "../folder/log.txt". Defina com um patrh absoluto "/path/absolute/folder/log.txt".
 *
 * Alguns provedores de hospedagem compartilhada não permitem configurar essa diretiva em tempo de execução.
 * Para esses casos, deve-se consultar o manual ou suporte do provedor de hospedagem sobre como ler logs de erro.
 */
#####ini_set('error_log', BASE_DIR . DIRECTORY_SEPARATOR . 'logs' . DS . 'php' . DIRECTORY_SEPARATOR . 'PHP_errors-' . date('Ym') . '.log');

/**
 * Normalmente não usamos esse recurso em ambiente de desenvolvimento e tampouco em ambiente de produção.
 * Recomenda-se manter como "false" por questões de performance.
 * true: ativa
 * false: desativa
 */
ini_set('html_errors', true);

/**
 * true: ativa a exibição de erros e avisos
 * false: desativa
 *
 * Em ambiente de produção, mantenha como "false". Em ambiente local, como "true".
 * Note que "display_errors" pode ser desativado pelo provedor de hospedagem. Normalmente, provedores de hospedagem compartilhada configuram como "false" por padrão e impedem a configuração em tempo de execução.
 * Para esses casos, deve-se consultar o manual ou suporte do provedor de hospedagem sobre como ler logs de erro.
 */
ini_set('display_errors', true);
