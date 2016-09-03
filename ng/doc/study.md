# MVC
AngularJs的MVC是借助通过$scope实现的

# C
不要试图去复用controller，一个控制器一般只负责一小块view
不要在controller中操作dom，这不是控制器的职责
不要在controller里面做数据格式化，ng有很好的表单控件
不要在controller里面做数据过滤操作，ng有$filter服务
一般来说，controller是不会互相调用的，控制器之间的交互会通过事件进行

# V
利用directive实现view复用

# $scope
$scope不仅是MVC的基础，也是后面实现双向数据绑定的基础


