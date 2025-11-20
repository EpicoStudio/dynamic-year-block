# Instruções para GitHub Copilot - Dynamic Year Block Plugin

Este arquivo contém instruções específicas para o GitHub Copilot auxiliar na manutenção e atualização do plugin Dynamic Year Block.

## Informações do Projeto

- **Nome do Plugin**: Dynamic Year Block
- **Repositório GitHub**: https://github.com/EpicoStudio/dynamic-year-block
- **Repositório WordPress.org**: https://plugins.svn.wordpress.org/dynamic-year-block/
- **Versão Atual**: 1.0.0
- **Requer WordPress**: 6.4 ou superior
- **Testado até**: 6.9
- **Requer PHP**: 7.4 ou superior
- **Node.js requerido**: v20.19.5

## Estrutura do Projeto

```
dynamic-year-block/
├── .github/                    # Configurações e instruções
├── build/                      # Arquivos compilados (não editar diretamente)
│   ├── blocks-manifest.php
│   └── dynamic-year-block/
│       ├── block.json
│       ├── index.asset.php
│       ├── index.js
│       └── render.php
├── languages/                  # Traduções
│   ├── dynamic-year-block.pot
│   ├── pt_BR.mo
│   └── pt_BR.po
├── previous-versions/          # Versões anteriores arquivadas
├── src/                        # Código fonte (editar aqui)
│   └── dynamic-year-block/
│       ├── block.json
│       ├── edit.js
│       ├── index.js
│       └── render.php
├── dynamic-year-block.php      # Arquivo principal do plugin
├── package.json
├── README.md
└── README.txt
```

## Workflow de Atualização do Plugin

### 1. Preparação do Ambiente

**Importante**: Sempre execute os comandos a partir do WordPress Studio, clicando no botão `iTerm` na aba "Visão Geral".

```bash
# Navegar para o diretório do plugin
cd /Users/mac/Studio/dynamic-year-block/wp-content/plugins/dynamic-year-block

# Verificar versão do Node.js (deve ser v20.19.5)
node --version

# Se necessário, instalar a versão correta
nvm install v20.19.5
nvm alias default 20.19.5

# Verificar instalação do wp-scripts
which wp-scripts

# Se não estiver instalado, instalar globalmente
npm install -g @wordpress/scripts
```

### 2. Desenvolvimento e Build

```bash
# Atualizar pacotes npm
npm run packages-update
# ou
npx @wordpress/scripts packages-update

# Iniciar modo de desenvolvimento (watch mode)
npm run start
# ou
npx @wordpress/scripts start

# Após finalizar as edições em /src/, gerar o build
npm run build
# ou
npx @wordpress/scripts build
```

**Importante**: O comando `npm run build` já executa `--blocks-manifest` automaticamente (veja `package.json`).

### 3. Atualizar Traduções

```bash
# Executar no diretório raiz do plugin
wp i18n make-pot . languages/dynamic-year-block.pot --slug=dynamic-year-block --domain=dynamic-year-block --exclude=node_modules,src
```

### 4. Gerar ZIP do Plugin

```bash
npm run plugin-zip
# ou
npx @wordpress/scripts plugin-zip
```

### 5. Versionamento e Git

```bash
# Adicionar arquivos modificados
git add .

# Commit com mensagem descritiva
git commit -m "Descrição das alterações"

# Push para o repositório remoto
git push origin main

# Criar tag de versão (substituir X.X.X pela versão)
git tag -a vX.X.X -m "Release version X.X.X"
git push origin vX.X.X
```

## Atualização no WordPress.org (SVN)

### Configuração Inicial do SVN

```bash
# Clonar o repositório SVN (apenas na primeira vez)
svn co https://plugins.svn.wordpress.org/dynamic-year-block/ svn

# Remover arquivos .DS_Store (macOS)
find . -name '.DS_Store' -type f -delete
```

### Credenciais SVN
- Credenciais armazenadas de forma segura (não incluídas neste repositório público)

### Workflow de Atualização no WordPress.org

```bash
# 1. Navegar para o diretório SVN local
cd svn

# 2. Atualizar cópia local do repositório SVN
svn up

# 3. Copiar arquivos atualizados para trunk/
# (Copiar manualmente os arquivos do build/ para svn/trunk/)

# 4. Adicionar novos arquivos (se houver)
svn add trunk/* --force

# 5. Remover arquivos obsoletos (se necessário)
svn delete trunk/arquivo-obsoleto.php

# 6. Verificar status
svn stat

# 7. Criar nova tag de versão (substituir X.X.X)
svn cp trunk tags/X.X.X

# 8. Commit para o WordPress.org
svn ci -m "Tagging version X.X.X"
```

### Exemplos de Mensagens de Commit SVN

```bash
svn ci -m "Tagging version 1.0.0"
svn ci -m "Updated README file"
svn ci -m "Bug fix: HTML escaping in text fields"
svn ci -m "Updated plugin icon images"
svn ci -m "Updated plugin banner images"
svn ci -m "Security and compatibility improvements"
```

## Regras Importantes para Edição

### 1. Compatibilidade Pregressa
- **NUNCA** remover prefixos `__experimental` de `block.json` sem testar em versões anteriores do WordPress
- **SEMPRE** testar o plugin em WordPress 6.4+ antes de lançar atualizações
- Manter retrocompatibilidade é prioridade máxima

### 2. Escape e Sanitização
- Usar `wp_kses_post()` para permitir HTML seguro em campos de texto
- Aplicar sanitização no momento da atribuição das variáveis
- **NUNCA** usar `esc_html()` em campos que devem aceitar HTML

### 3. Versionamento
- Atualizar versão em **três lugares** antes do release:
  1. `dynamic-year-block.php` (header do plugin)
  2. `package.json` (campo `version`)
  3. `src/dynamic-year-block/block.json` (campo `version`)
- Sempre criar tag git correspondente à versão

### 4. Changelog
- Atualizar `README.txt` com entry de changelog para cada versão
- Seguir o formato existente e ser claro sobre mudanças

### 5. Build e Deploy
- **NUNCA** editar arquivos em `build/` diretamente
- **SEMPRE** editar em `src/` e rodar `npm run build`
- Verificar que o build foi bem-sucedido antes do commit

## Comandos Rápidos de Referência

```bash
# Desenvolvimento
npm run start              # Modo watch
npm run build             # Build de produção
npm run plugin-zip        # Gerar ZIP

# Git
git add .
git commit -m "message"
git push origin main
git tag -a vX.X.X -m "Release version X.X.X"
git push origin vX.X.X

# SVN WordPress.org (credenciais armazenadas separadamente)
cd svn
svn up
svn add trunk/* --force
svn cp trunk tags/X.X.X
svn ci -m "message"
```

## Automações Sugeridas para Copilot

Quando o usuário solicitar "atualizar plugin" ou "fazer release", seguir este checklist:

1. ✅ Verificar se as versões estão sincronizadas (PHP, JSON, package.json)
2. ✅ Executar `npm run build`
3. ✅ Verificar se há erros de lint/compilação
4. ✅ Atualizar `README.txt` com changelog
5. ✅ Criar `git commit` e `git tag`
6. ✅ Fazer `git push` (main e tag)
7. ✅ Gerar ZIP do plugin
8. ⚠️ Lembrar usuário de atualizar SVN manualmente (não automatizar SVN)

## Links Úteis

- [WordPress Scripts Reference](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/)
- [Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [Plugin Handbook - SVN](https://developer.wordpress.org/plugins/wordpress-org/how-to-use-subversion/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)

## Notas Adicionais

- O plugin usa **API version 3** do Block Editor
- Suporta **interactivity API** com `clientNavigation: true`
- Renderização server-side via `render.php`
- Traduções gerenciadas via `.pot`, `.po`, `.mo` files
- Testado com WordPress Playground: https://playground.wordpress.net/?plugin=dynamic-year-block
