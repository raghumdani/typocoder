#include <stdio.h>
#include<math.h>
int main()
{
    int a[100001]={[0 ... 100000]=1},t,i,j,n;


    scanf("%d",&t);
    for(i=2;i<=(int)(sqrt(100000));i++)
    {
        if(a[i])
            for(j=i*i;j<=100000;j+=i)
                a[j]=0;
    }
    for(i=0;i<t;i++)
    {
        scanf("%d",&n);
        if(a[n]==1)
            printf("YES\n");
        else
            printf("NO\n");
    }



	return(0);
}