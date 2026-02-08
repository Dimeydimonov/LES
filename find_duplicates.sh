#!/bin/bash

# Скрипт для поиска дублирующихся CSS свойств в одном правиле

echo "Поиск дублирующихся CSS свойств..."
echo "=================================="

# Временный файл для хранения текущего правила
temp_rule=$(mktemp)

# Анализируем CSS файл
awk '
/^[[:space:]]*[^/].*\{/ {
    # Начало нового правила - сохраняем предыдущее и проверяем на дубликаты
    if (current_rule != "") {
        print current_rule > "'$temp_rule'"
        close("'$temp_rule'")
        
        # Проверяем на дубликаты
        while (getline line < "'$temp_rule'") {
            if (line ~ /^[[:space:]]*[a-zA-Z-]+:/) {
                prop = gensub(/^[[:space:]]*([a-zA-Z-]+):.*/, "\\1", "g", line)
                if (prop in seen_props) {
                    print "Дубликат свойства '" prop "' в правиле, начинающемся на строке " rule_start
                } else {
                    seen_props[prop] = 1
                }
            }
        }
        delete seen_props
        close("'$temp_rule'")
    }
    
    # Начинаем новое правило
    rule_start = NR
    current_rule = $0 ORS
    next
}

/^[[:space:]]*\}/ {
    # Конец правила
    current_rule = current_rule $0 ORS
    print current_rule > "'$temp_rule'"
    close("'$temp_rule'")
    
    # Проверяем на дубликаты
    while (getline line < "'$temp_rule'") {
        if (line ~ /^[[:space:]]*[a-zA-Z-]+:/) {
            prop = gensub(/^[[:space:]]*([a-zA-Z-]+):.*/, "\\1", "g", line)
            if (prop in seen_props) {
                print "Дубликат свойства '" prop "' в правиле, начинающемся на строке " rule_start
            } else {
                seen_props[prop] = 1
            }
        }
    }
    delete seen_props
    close("'$temp_rule'")
    current_rule = ""
    next
}

{
    if (current_rule != "") {
        current_rule = current_rule $0 ORS
    }
}
' /home/dima/work/LES/public/css/style.css

rm -f "$temp_rule"
