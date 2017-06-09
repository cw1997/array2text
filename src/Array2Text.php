<?php
namespace Changwei;

/**
* @author 昌维[867597730@qq.com]
* @website http://github.com/cw1997
* @date 2017-06-08 21:22:55
*/
class Array2Text
{

	function __construct()
	{
		# code...
	}

	/**
	 * 将关联数组转换为字符串表示的表格形式
	 * @param  array  $arr 要转换的关联数组
	 * @return string      输出用字符串组成的表格
	 * @example
	 *  +----+-------+--------+
	 *  | id | title | author |
	 *  +----+-------+--------+
	 *  | 1  | test  | cw1997 |
	 *  +----+-------+--------+
	 */
	public static function array2text(array $arr)
	{
		// 检测是否为有效数组
		if ( ! isset($arr[0]) ) {
			throw new \Exception("Error Input Array");
		}

		// 将keys索引数组转换为关联数组，并将关联键名unshift到头部作为表头
		$keys = array_keys($arr[0]);
		foreach ($keys as $key => $value) {
			$keys[$value] = $value;
			unset($keys[$key]);
		}
		array_unshift($arr, $keys);

		// 行列翻转为以列名为顶级下标的关联数组，为后面存储列宽度做准备
		foreach ( $arr as $key => $value ) {
			foreach ($keys as $oldArrKey) {
				$newArr[$oldArrKey][$key] = $value[$oldArrKey];
			}
		}

		// 每列宽度等于该列最长的那个数据项长度
		$columnWidth = [];
		foreach ( $newArr as $key => $value ) {
			foreach ($value as $str) {
				$tmp[$key][] = self::_strLength($str);
			}
			// $tmp[$key][] = self::_strLength($key); // 标题也要计算
			$columnWidth[$key] = max($tmp[$key]);
		}

		// 重新获取一次keys，因为之前把索引下标给unset了
		$keys = array_keys($arr[0]);

		// 缓存行列数
		$rowNum = count($arr);
		$colNum = count($arr[0]);

		$rowStr = '';
		// 行遍历
		for ( $rowIndex=0; $rowIndex < $rowNum; $rowIndex++ ) {
			// 表头顶部边框输出
			for ( $colIndex=0; $colIndex < $colNum; $colIndex++ ) {
				// 左右各加2个空格的内边距
				$rowStr .= ('+' . self::_printByTimes('-', $columnWidth[$keys[$colIndex]] + 2));
			}
			$rowStr .= "+\n";
			// 行内容输出
			for ( $colIndex=0; $colIndex < $colNum; $colIndex++ ) {
				$colName = iconv('utf-8', 'gbk', $keys[$colIndex]);
				$colData = iconv('utf-8', 'gbk', $arr[$rowIndex][$colName]);
				$colWid = $columnWidth[$keys[$colIndex]];
				$colDataLength = strlen($colData);
				$paddingRight = $colWid - $colDataLength;
				$rowStr .= ('|' .
					' ' .
					$colData .
					self::_printByTimes( ' ', $paddingRight ) .
					' ');
			}
			$rowStr .= "|\n";
		}
		// 表格底部边框输出
		for ( $colIndex=0; $colIndex < $colNum; $colIndex++ ) {
			$rowStr .= ('+' . self::_printByTimes('-', $columnWidth[$keys[$colIndex]] + 2));
		}
		$rowStr .= "+\n";
		return $rowStr;
	}


	/**
	 * 将UTF8转换为GBK来计算字符串长度
	 * 即中文算作双字节，西文算作单字节
	 * @param  string $str 需要转换的UTF8字符串
	 * @return int      字符串长度
	 */
	private static function _strLength($str)
	{
		return strlen(iconv('utf-8', 'gbk', $str));
	}

	/**
	 * 返回某个字符串重复一定次数后的新字符串
	 * @param  string $str   需要重复的字符串
	 * @param  int $times 重复次数
	 * @return string        str重复times次之后的字符串
	 */
	private static function _printByTimes($str, $times)
	{
		$ret = '';
		if ($times < 0) {
			return $ret;
		}
		for ($i=0; $i < $times; $i++) {
			$ret .= $str;
		}
		return $ret;
	}

}
