#!/bin/bash

echo "Поиск дублирующихся CSS свойств..."
echo "=================================="

# Находим все CSS правила и проверяем каждое на дубликаты
awk '
/^[[:space:]]*[^/].*\{/ {
    rule_start = NR
    in_rule = 1
    print "Правило начинается на строке " rule_start ": " $0
    next
}

/^[[:space:]]*\}/ {
    if (in_rule) {
        print "Правило заканчивается на строке " NR
        print "---"
        in_rule = 0
        delete props
    }
    next
}

{
    if (in_rule && /^[[:space:]]*[a-zA-Z-]+:/) {
        # Извлекаем имя свойства
        match($0, /^[[:space:]]*([a-zA-Z-]+):/, arr)
        prop = arr[1]
        
        if (prop in props) {
            print "  ДУБЛИКАТ: " prop " на строке " NR " (уже было на строке " props[prop] ")"
        } else {
            props[prop] = NR
        }
    }
}
' /home/dima/work/LES/public/css/style.css
