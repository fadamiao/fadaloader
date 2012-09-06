<?php
	class fadaloader {
		public $path = 'uploads';
		public $status = array();

		function generateForm($name = 'form', $id ='form', $class='', $action='', $method='POST', $fld = 10, $lbl = 'file', $vSubmit = 'Enviar arquivos!') {
			$buffer = '';
			$buffer .= "<form name=\"{$name}\" id=\"{$id}\" class=\"{$class}\" action=\"{$action}\" method=\"{$method}\" enctype=\"multipart/form-data\">\n";
			$buffer .= "\t\t\t<ul id=\"{$class}\">\n";
			for ($i = 0; $i < ($fld); $i++){
				$buffer .= "\t\t\t\t<li><input type=\"file\" name=\"{$lbl}{$i}\" /></li>\n";
			}
			$buffer .= "\t\t\t\t<li><input type=\"submit\" name=\"submit\" value=\"{$vSubmit}\" /></li>\n";
			$buffer .= "\t\t\t</ul>\n";
			$buffer .= "\t\t</form>\n";
			return $buffer;
		}

		function upload() {
			if (isset($_POST['submit'])) {
				$allowed_ext = array('jpg', 'jpeg', 'png', 'pdf');
				$count_file = 0;
				foreach ($_FILES as $arquivos) {
					if (strlen($arquivos['name']) > 0) {
						$count_status = 0;
						$this->status[$count_file][$count_status++] = $arquivos['name'];
						$file_name = $arquivos['name'];
						$file_verf = explode('.', $file_name);
						$file_ext = strtolower(end(explode('.', $file_name)));	
						$file_size = $arquivos['size'];
						$file_tmp = $arquivos['tmp_name'];

						if (in_array($file_ext, $allowed_ext) === false) {
							$this->status[$count_file][$count_status++] = 'Tipo de arquivo não permitido';
						}

						if ($file_size > 2097152) {
							$this->status[$count_file][$count_status++] = 'Tamhanho de arquivo muito grande';
						}

						if ((count($file_verf) < 2) || (count($file_verf) > 2)) {
							$this->status[$count_file][$count_status++] = 'Arquivo não permitido';
						}

						if (count($this->status[$count_file]) == 1) {
							move_uploaded_file($file_tmp, "{$this->path}/{$file_name}");
							chmod("{$this->path}/{$file_name}", 0644);
							$this->status[$count_file][$count_status++] = 'Arquivo enviado';
						}
						$count_file++;
					}
				}
			}
		}		

		function status() {
			$quant = count($this->status);
			$buffer = '';
			$buffer .= "<div class=\"fadaloader\">\n";
			$buffer .= "\t\t\t<ul>\n";
			for ($i=0; $i<$quant; $i++) {
				$buffer .= "\t\t\t\t<li>{$this->status[$i][0]} - {$this->status[$i][1]}</li>\n";
			}
			$buffer .= "</ul>";
			$buffer .= "</div>\n";
			return $buffer;
		}
	}
?>
