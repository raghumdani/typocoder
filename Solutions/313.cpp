#include<stdio.h>
#include<math.h>
//long countarr[pow(10,6)];

int main()
{
	long countarr[(long)pow(10,6)];
	//printf("%ld",countarr[100]);
	long n,q;
	scanf("%ld",&n);
	long arr[n];
	long i,j;
	for(i=0;i<n;i++)
		{scanf("%ld",&arr[i]);countarr[arr[i]-1]++;}
	scanf("%ld",&q);
	long ans[q];
	for(j=0;j<q;j++)
	{
	long l,r;
	scanf("%ld %ld",&l,&r);
	long prod=1;
	for(i=0;i<pow(10,6);i++)
		{if(countarr[i]>0&&i+1>=l&&i+1<=r) prod*=(i+1);}
	ans[j]=prod%((long)pow(10,9)+7);
	}
	
	for(j=0;j<q;j++)
	{
		printf("%ld\n",ans[j]);
	}
	return 0;
}