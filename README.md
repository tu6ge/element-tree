# element-tree

该composer 包是用来方便element-ui读取文件目录的

# Install

```
composer require tu6ge/element-tree
```

# Use

```php
include_once "vendor/autoload.php";

$tree = new \ElementTree\Tree();
$rs = $tree->get(__DIR__);

$json = json_encode($rs);

```

```vue
<template>
   <el-tree :data="list" :props="defaultProps" @node-click="handleNodeClick"></el-tree>
</template>
<script>
import {Tree} from "element-ui"
export default {
  name: 'HelloWorld',
  data () {
    return {
        msg: 'Welcome to Your Vue.js App',
        list: 'php response json data'
        defaultProps: {
          children: 'children',
          label: 'label'
        }
    }
  },
  methods:{
      handleNodeClick(data) {
        console.log(data);
      }
  },
  components:{
      [Tree.name]:Tree
  }
}
</script>

```
