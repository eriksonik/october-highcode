
## Установка

* Установить и включить плагин.
* Добавить на нужную страницу компонент.

## Использование

### С помощью тега pre

SyntaxHighlighter  ищет теги `<pre />`, которые имеют специально отформатированный атрибут class. Формат атрибута совпадает с атрибутом стиля CSS. Единственным обязательным параметром является `brush` (см. [конфигурацию](http://alexgorbatchev.com/SyntaxHighlighter/manual/configuration/)), которая должна быть установлена как одна из [псевдонимов brush](http://alexgorbatchev.com/SyntaxHighlighter/manual/brushes/).

**ПРЕИМУЩЕСТВА:** Работает повсюду, изящный откат, если есть проблемы с скриптом, отображается во всех RSS-читателях как обычный pre.

**ПРОБЛЕМЫ:** Основная проблема этого метода заключается в том, что все открывающие угловые скобки должны быть экранированы HTML, например, все `<` должны быть заменены на `&lt;` Это обеспечит правильную визуализацию.

Примеры:

```
<pre class="brush: php">
function foo($id = null) {
    $item = new NewItem($id);
    $field = $item->info();
    return $field;
}
</pre>

<pre class="brush: js">
/**
 * SyntaxHighlighter
 */
function foo() {
    if (counter <= 10)
        return;
    // it works!
}
</pre>

<pre class="brush: css">
.syntaxhighlighter:before {
    position: absolute;
    top: .4em;
    right: 1.8em;
    font-size: .8em;
    z-index: 10;
}
</pre>

<pre class="brush: html">
<div class="ref" id="ref">
    <div class="color-primary"></div>
    <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
    </div>
</div>
</pre>
```

### С помощью тега script

Этот способ появился в 2.1 версии. SyntaxHighlighter ищет `<script type="syntaxhighlighter" />`, которые имеют специально отформатированный атрибут class. Формат атрибута совпадает с атрибутом стиля CSS. Единственным обязательным параметром является `brush` (см. [конфигурацию](http://alexgorbatchev.com/SyntaxHighlighter/manual/configuration/)), которая должна быть установлена как одна из [псевдонимов brush](http://alexgorbatchev.com/SyntaxHighlighter/manual/brushes.html).

Преимущество этого метода заключается в способности размещать практически что угодно внутри CDATA без необходимости ничего скрывать, поэтому это позволяет прямо «вырезать и вставлять» из вашего любимого текстового редактора.

**ПРЕИМУЩЕСТВА:** не требует экранирования правой угловой скобки.

**ПРОБЛЕМЫ:**
1. Тег `<script />` вырезается большинством RSS-читателей, поэтому, если вы используете SyntaxHighlighter в блоге, вам лучше использовать метод `<pre />`.
2. Если вы включаете закрывающий тег скрипта `</script>`, даже внутри блока CDATA, большинство браузеров неверно преждевременно закрывают тег `<script type="syntaxhighlighter">`.

Примеры (обратите внимание на необходимый тег CDATA):

```
<script type="syntaxhighlighter" class="brush: js"><![CDATA[
  /**
   * SyntaxHighlighter
   */
  function foo()
  {
      if (counter <= 10)
          return;
      // it works!
  }
]]></script>
```

## Ссылки
* [Installation](http://alexgobatchev.com/SyntaxHighlighter/manual/installation.html)
* [GitHub](https://github.com/syntaxhighlighter/syntaxhighlighter)
