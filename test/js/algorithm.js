//一维树数组 转 多维递归数组
function nodeRecursion(nodes, pid) {
    var result = [], tmp;
    for (var i in nodes) {
        if (nodes[i].pid === pid) {
            var obj = Util.deepCopy(nodes[i], {});
            tmp = arguments.callee.apply({}, [nodes, nodes[i].id]);
            if (tmp.length > 0) {
                obj.childs = tmp;
            }
            result.push(obj);
        }
    }
    return result;
}