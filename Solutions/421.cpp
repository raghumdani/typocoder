#include <stdio.h>

int main(){
	int t, i;
	scanf("%d", &t);
	int answerList[100];
	for (i=0;i<t;i++)
	{
		int num, temp, prod = 1, rem;
		scanf("%d", &num);
		temp = num;
		while (temp>0)
		{
			rem = temp%10;
			prod*=rem;
			temp/=10;
		}
		answerList[i] = prod;
		
	}
	for (i=0;i<t;i++)
		printf("%d\n", answerList[i]);
		
	return (0);
}