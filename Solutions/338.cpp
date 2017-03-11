#include<stdio.h>
#include<math.h>
//long countarr[pow(10,6)];

int main()
{
	
	//printf("%ld",countarr[100]);
	long n,q;
	scanf("%ld",&n);
	long arr[n];
	long i,j;
	for(i=0;i<n;i++)
		{scanf("%ld",&arr[i]);}
	scanf("%ld",&q);
	long ans[q];
	for(j=0;j<q;j++)
	{
	long countarr[(long)pow(10,6)];
	for(i=0;i<pow(10,6);i++) countarr[i]=0;
	//printf("%ld\n",countarr[3]);
	long l,r;
	scanf("%ld %ld",&l,&r);
	long prod=1;
	for(i=l-1;i<=r-1;i++)
		{
			countarr[arr[i]-1]++;
			if(countarr[arr[i]-1]==1) prod*=arr[i];
		}
	ans[j]=prod%((long)pow(10,9)+7);
	}
	
	for(j=0;j<q;j++)
	{
		printf("%ld\n",ans[j]);
	}
	return 0;
}