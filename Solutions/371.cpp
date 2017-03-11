#include<stdio.h>
main()
{
    int n,sum=1,a,i,m;
    scanf("%d",&n);
    for(i=0;i<n;i++)
    {
        scanf("%d",&a);
        sum=1;
        while(a>0)
        {
            m=a%10;
            sum*=m;
            a=a/10;
        }
        printf("%d\n",sum);
    }
}
