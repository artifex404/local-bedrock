<?php
/**
 * Ensure there is a single space after scope keywords.
 *
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2015 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 */

namespace PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Util\Tokens;

class ScopeKeywordSpacingSniff implements Sniff
{


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        $register   = Tokens::$scopeModifiers;
        $register[] = T_STATIC;
        return $register;

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being scanned.
     * @param int                         $stackPtr  The position of the current token
     *                                               in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $prevToken = $phpcsFile->findPrevious(T_WHITESPACE, ($stackPtr - 1), null, true);
        $nextToken = $phpcsFile->findNext(T_WHITESPACE, ($stackPtr + 1), null, true);

        if ($tokens[$stackPtr]['code'] === T_STATIC
            && ($tokens[$nextToken]['code'] === T_DOUBLE_COLON
            || $tokens[$prevToken]['code'] === T_NEW)
        ) {
            // Late static binding, e.g., static:: OR new static() usage.
            return;
        }

        if ($tokens[$prevToken]['code'] === T_AS) {
            // Trait visibilty change, e.g., "use HelloWorld { sayHello as private; }".
            return;
        }

        if ($tokens[($stackPtr + 1)]['code'] !== T_WHITESPACE) {
            $spacing = 0;
        } else {
            if ($tokens[($stackPtr + 2)]['line'] !== $tokens[$stackPtr]['line']) {
                $spacing = 'newline';
            } else {
                $spacing = $tokens[($stackPtr + 1)]['length'];
            }
        }

        if ($spacing !== 1) {
            $error = 'Scope keyword "%s" must be followed by a single space; found %s';
            $data  = [
                $tokens[$stackPtr]['content'],
                $spacing,
            ];

            $fix = $phpcsFile->addFixableError($error, $stackPtr, 'Incorrect', $data);
            if ($fix === true) {
                if ($spacing === 0) {
                    $phpcsFile->fixer->addContent($stackPtr, ' ');
                } else {
                    $phpcsFile->fixer->replaceToken(($stackPtr + 1), ' ');
                }
            }
        }

    }//end process()


}//end class
