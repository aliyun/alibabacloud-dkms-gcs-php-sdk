<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace GPBMetadata;

class Api
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(hex2bin(
            "0ae80f0a096170692e70726f746f122b416c6962616261436c6f75642e44" .
            "6b6d732e4763732e4f70656e4170692e5574696c2e50726f746f62756622" .
            "420a114b6d73456e637279707452657175657374120d0a054b6579496418" .
            "012001280912110a09506c61696e7465787418022001280c120b0a034161" .
            "6418032001280c224e0a124b6d73456e6372797074526573706f6e736512" .
            "0d0a054b6579496418012001280912160a0e43697068657274657874426c" .
            "6f6218022001280c12110a0952657175657374496418032001280922730a" .
            "0e456e637279707452657175657374120d0a054b65794964180120012809" .
            "12110a09506c61696e7465787418022001280c12110a09416c676f726974" .
            "686d180320012809120b0a0341616418042001280c120a0a024976180520" .
            "01280c12130a0b50616464696e674d6f6465180620012809227f0a0f456e" .
            "6372797074526573706f6e7365120d0a054b657949641801200128091216" .
            "0a0e43697068657274657874426c6f6218022001280c120a0a0249761803" .
            "2001280c12110a0952657175657374496418042001280912110a09416c67" .
            "6f726974686d18052001280912130a0b50616464696e674d6f6465180620" .
            "01280922380a114b6d73446563727970745265717565737412160a0e4369" .
            "7068657274657874426c6f6218012001280c120b0a034161641802200128" .
            "0c22490a124b6d7344656372797074526573706f6e7365120d0a054b6579" .
            "496418012001280912110a09506c61696e7465787418022001280c12110a" .
            "0952657175657374496418032001280922780a0e44656372797074526571" .
            "7565737412160a0e43697068657274657874426c6f6218012001280c120d" .
            "0a054b6579496418022001280912110a09416c676f726974686d18032001" .
            "2809120b0a0341616418042001280c120a0a02497618052001280c12130a" .
            "0b50616464696e674d6f6465180620012809226e0a0f4465637279707452" .
            "6573706f6e7365120d0a054b6579496418012001280912110a09506c6169" .
            "6e7465787418022001280c12110a09526571756573744964180320012809" .
            "12110a09416c676f726974686d18042001280912130a0b50616464696e67" .
            "4d6f646518052001280922650a0b5369676e52657175657374120d0a054b" .
            "65794964180120012809120e0a0644696765737418022001280c12110a09" .
            "416c676f726974686d180320012809120f0a074d65737361676518042001" .
            "280c12130a0b4d65737361676554797065180520012809226b0a0c536967" .
            "6e526573706f6e7365120d0a054b6579496418012001280912110a095369" .
            "676e617475726518022001280c12110a0952657175657374496418032001" .
            "280912110a09416c676f726974686d18042001280912130a0b4d65737361" .
            "676554797065180520012809227a0a0d5665726966795265717565737412" .
            "0d0a054b65794964180120012809120e0a0644696765737418022001280c" .
            "12110a095369676e617475726518032001280c12110a09416c676f726974" .
            "686d180420012809120f0a074d65737361676518052001280c12130a0b4d" .
            "6573736167655479706518062001280922690a0e56657269667952657370" .
            "6f6e7365120d0a054b65794964180120012809120d0a0556616c75651802" .
            "2001280812110a0952657175657374496418032001280912110a09416c67" .
            "6f726974686d18042001280912130a0b4d65737361676554797065180520" .
            "012809222d0a0b486d616352657175657374120d0a054b65794964180120" .
            "012809120f0a074d65737361676518022001280c22430a0c486d61635265" .
            "73706f6e7365120d0a054b6579496418012001280912110a095369676e61" .
            "7475726518022001280c12110a0952657175657374496418032001280922" .
            "270a1547656e657261746552616e646f6d52657175657374120e0a064c65" .
            "6e677468180120012805223b0a1647656e657261746552616e646f6d5265" .
            "73706f6e7365120e0a0652616e646f6d18012001280c12110a0952657175" .
            "657374496418022001280922310a0b4861736852657175657374120f0a07" .
            "4d65737361676518012001280c12110a09416c676f726974686d18022001" .
            "280922310a0c48617368526573706f6e7365120e0a064469676573741801" .
            "2001280c12110a09526571756573744964180320012809225e0a1647656e" .
            "6572617465446174614b657952657175657374120d0a054b657949641801" .
            "2001280912110a09416c676f726974686d18022001280912150a0d4e756d" .
            "6265724f664279746573180320012805120b0a0341616418042001280c22" .
            "85010a1747656e6572617465446174614b6579526573706f6e7365120d0a" .
            "054b65794964180120012809120a0a02497618022001280c12110a09506c" .
            "61696e7465787418032001280c12160a0e43697068657274657874426c6f" .
            "6218042001280c12110a0952657175657374496418052001280912110a09" .
            "416c676f726974686d18062001280922240a134765745075626c69634b65" .
            "7952657175657374120d0a054b65794964180120012809224b0a14476574" .
            "5075626c69634b6579526573706f6e7365120d0a054b6579496418012001" .
            "280912110a095075626c69634b657918022001280912110a095265717565" .
            "7374496418032001280922570a054572726f7212120a0a53746174757343" .
            "6f646518012001280512110a094572726f72436f64651802200128091214" .
            "0a0c4572726f724d65737361676518032001280912110a09526571756573" .
            "744964180420012809620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
